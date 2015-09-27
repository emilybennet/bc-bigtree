/*-------------------------------------------
  Document Ready and Load Functions
-------------------------------------------*/

$(function(){
  // initSequence();
  initReveal();
  initNavSlider();
  initChosen();
  initFormValidation();
  setBillboardHeight();
  oldIeModal();
  bronyconHotels();
  bronyconGuests();
  bronyconRegistration();
  bronyconSchedule();
  vendorMap();
  $(window).bind('orientationchange', function(){
    setBillboardHeight();
  });
});



/*-------------------------------------------
  Sequence.js
-------------------------------------------*/

function initReveal() {
  if ($('.reveal').length) {
    Reveal.initialize({
      transition: 'linear',
      backgroundTransition: 'slide',
      center: false,
      minScale: 1.0,
      touch: false,
      loop: true,
      autoSlide: 10000,
      controls: false,
      width: 'auto',
      height: 'auto',
      keyboard: {
        27: null,
        66: null,
        70: null,
        79: null,
        190: null,
        191: null
      }
    });

    $('.paginate.right').click(function(){
      Reveal.right();
    });

    $('.paginate.left').click(function(){
      Reveal.left();
    });

    $('.billboard.reveal').mouseenter(function(){
      Reveal.configure({ autoSlide: 0 });
    });

    $('.billboard.reveal').mouseleave(function(){
      Reveal.configure({ autoSlide: 10000 });
    });

    function changeNavColor() {
      target = $('.billboard .slides section.present');
      contentColor = target.data('content-color');

      $('.billboard .paginate').css('color',contentColor);
      $('.billboard .progress span').css('background-color',contentColor);
    }

    Reveal.addEventListener( 'ready', function( event ) {
      changeNavColor();
    });

    Reveal.addEventListener( 'slidechanged', function( event ) {
      changeNavColor();
    });
  }
}



/*-------------------------------------------
  Billboard messages
-------------------------------------------*/

function setBillboardHeight() {
  var winH = $(window).height();
  var winW = $(window).outerWidth();
  if (winW < 650 && winH < 330) {
    var billH = 350;
  } else {
    var billH = winH - 90;
  }
  $('.billboard').height(billH);
}



/*-------------------------------------------
  Nav Slider
-------------------------------------------*/

function initNavSlider() {
  // toggle slider when we click the control
  $('header .nav-slider-control, .nav-slider-open .site-wrapper').on('click', function(){
    $('.global-wrapper').toggleClass('nav-slider-open');
    return false;
  });

  // and def cancel the slider if we click the body
  $('body').on('click', '.nav-slider-open .site-wrapper', function(){
    $('.global-wrapper').removeClass('nav-slider-open');
    return false;
  });

  // if we click a nav item with children
  $('.nav-slider-navigation a').click(function(){
    if ($(this).closest('li').children('ul.sub-nav').length != 0){
      $(this).closest('li').children('ul.sub-nav').toggle();
      return false;
    }
  });
}


/*-------------------------------------------
  Terminate IE Modal
-------------------------------------------*/

function oldIeModal() {
  $('.old-ie-modal').on('click', '.btn-close', function(){
    $('.old-ie-modal').remove();
    return false;
  });
}


/*-------------------------------------------
  Hotels
-------------------------------------------*/

function bronyconHotels(){

  if ($('#hotel-map').length > 0) {

    var www_root = window.location.protocol.replace(/\:/g, '')+"://"+window.location.host+'/';

    var southWestLimit = new L.LatLng(39.192114, -76.709637),
        norhtWestLimit = new L.LatLng(39.373483, -76.530594),
        // center_lng = -76.618563,
        // center_lat = 39.285789,
        center_lng = -76.617491,
        center_lat = 39.285702,
        mapBounds = new L.LatLngBounds(southWestLimit, norhtWestLimit);

    var map = L.mapbox.map('hotel-map', 'bronycon.map-cx34u7pa', { 
      zoomControl: false,
      maxBounds: mapBounds
    });
    new L.Control.Zoom({ position: 'bottomleft' }).addTo(map);
    map.scrollWheelZoom.disable();
    // map.dragging.disable();

    var conventionCenterPlace = {
      type: "FeatureCollection",
      features: [{
        type: "Feature",
        geometry: {
            type: "Point",
            coordinates: [center_lng, center_lat]
        },
        properties: {
          "title":"BronyCon @ Baltimore Convention Center",
          icon: {
            "iconUrl": www_root+"images/cutie-mark-mane-event-30x30.png",
            "iconSize": [30, 30],
            "iconAnchor": [10, 15],
            "popupAnchor": [300, 300]
          }
        }
      }]
    };

    // Set a custom icon on each marker based on feature properties
    map.markerLayer.on('layeradd', function(e) {
        var marker = e.layer,
            feature = marker.feature;

        marker.setIcon(L.icon(feature.properties.icon));
    });

    // Add features to the map
    map.markerLayer.setGeoJSON(conventionCenterPlace);



    var markerLayer = L.mapbox.markerLayer()
    .loadURL(www_root+'ajax/city-guide/hotels')
    .addTo(map);

    markerLayer.on('ready', function() {
      markerLayer.eachLayer(function(layer) {
        var content = '<header>' + layer.feature.properties.title + '<\/header>' +
            (layer.feature.properties.price.promo_expired != true ?
            '<span class="price"> ' + layer.feature.properties.price.value + ' / night<\/span>' : '' )+
            (layer.feature.properties.price.promo_code != false && layer.feature.properties.price.promo_expired != true ? '<span class="promo-code">Use Code: '+layer.feature.properties.price.promo_code+'</span>' : '')+
            '<span class="book-it">'+
              (layer.feature.properties.price.promo_expired != true ?
                (layer.feature.properties.contact.website != '' ? 
                  (layer.feature.properties.price.promo_website != '' ?
                    '<a href="' + layer.feature.properties.price.promo_website + '" class="btn btn-purple btn-sm" target="_blank">'+
                      'Book It'+
                    '</a>'
                    : '<a href="' + layer.feature.properties.contact.website + '" class="btn btn-purple btn-sm" target="_blank">'+
                      'Book It'+
                    '</a>' )
                : '<span class="btn btn-grey btn-sm btn-disabled">Call to Book</span> ' )
                : '<span class="btn btn-grey btn-sm btn-disabled">Sold Out</span>' ) +
             '<a href="#' + URLify(layer.feature.properties.title) + '" class="btn btn-purple btn-sm more-hotel-info">' +
                'More Info'+
              '</a>'+
            '<\/span>';

        layer.bindPopup(content);
      });
    });

    markerLayer.on('click', function(e) {
      map.panTo(e.layer.getLatLng());
    });


    // smooth scroll
    $('body').on('click', '.btn.more-hotel-info',function(e) {
      if (this.hash != '') {
        e.preventDefault();

        var desiredOffset = -50;
        var target = this.hash;
            $target = $(target);
        var contentPosTop = $target.offset().top+desiredOffset;

        $('html, body').stop().animate({
            'scrollTop': contentPosTop
        }, 900, 'swing');
      }
    });
  }
}



/*-------------------------------------------
  Registration
-------------------------------------------*/

function bronyconRegistration() {
  var activeBadge;

  function activateBadgeType(badgeType){
    if (activeBadge != badgeType) {
      $('section.badge[data-badge-type="'+activeBadge+'"]').removeClass('active');
      $('section.badge[data-badge-type="'+badgeType+'"]').addClass('active');

      $('section.badge[data-badge-type="'+activeBadge+'"] .btn')
        .removeClass('btn-white').addClass(function(){
          return $(this).data('original-btn-color');
        });
      $('section.badge[data-badge-type="'+badgeType+'"] .btn')
        .addClass('btn-white').removeClass(function(){
          return $(this).data('original-btn-color');
        });

      activeBadge = badgeType;
    }
  }

  $('.badge-types-table li').each(function(){
    $widgetHeight = $(this).height();
    $('section, span.highlight',$(this)).height($widgetHeight);
  });

  $('.badge-types-table .btn').each(function(){
    if ($(this).hasClass('btn-purple')) {
      var btnDefaultColor = 'btn-purple';
    } else if ($(this).hasClass('btn-grey')) {
      var btnDefaultColor = 'btn-grey';
    }
    $(this).attr('data-original-btn-color', btnDefaultColor);
  });

  $('.badge-types-table section.badge').hover(function(){
    badgeType = $(this).data('badge-type');
    activateBadgeType(badgeType);
  });

  $('.badge-types-table').mouseleave(function(){
    clearActiveBadgeType = setTimeout(function(){
      $('section.badge').removeClass('active');
      $('section.badge .btn')
        .removeClass('btn-white').addClass(function(){
          return $(this).data('original-btn-color');
        });
      activeBadge = null;
    }, 10);
    clearActiveBadgeType;
  });
}



/*-------------------------------------------
  Hotels
-------------------------------------------*/

function bronyconGuests() {
  function resizeImageGroup(){
    $('.bronycon-guests .image-group').each(function(){
      imgWidth = $(this).find('img:first').outerWidth();
      $(this).css({"height":imgWidth});
    });
  };

  resizeImageGroup();

  $(window).resize(function(){ resizeImageGroup(); });
}


/*-------------------------------------------
  Chosen element
-------------------------------------------*/

function initChosen() {
  $(".chosen-select").chosen();

  // z-index issue with chosen
  $('.chosen-select').on('chosen:showing_dropdown', function() {
    var formElement = $(this).parents(".form-element");
    var fieldset = $(this).parents(".fieldset");
    $(formElement).css({"z-index":"100"});
    $(fieldset).css({"z-index":"100"});
  }).on('chosen:hiding_dropdown', function() {
    var formElement = $(this).parents(".form-element");
    var fieldset = $(this).parents(".fieldset");
    $(formElement).css({"z-index":"auto"});
    $(fieldset).css({"z-index":"auto"});
  });

}


/*-------------------------------------------
  Form Validation
-------------------------------------------*/

function initFormValidation() {

  $.formUtils.addValidator({
    name: 'human_check',
    validatorFunction : function(value, $el, config, language, $form) {
      var answerKey = $el.siblings('.validation-acceptable-response').val().toLowerCase().split('|');
      var value = value.toLowerCase();
      if ($.inArray(value, answerKey) != -1) {
        return true;
      }
    },
    errorMessage: 'Sorry robot, not this time.',
    errorMessageKey: 'badHumanCheck'
  });

  $.validate();
}



/*-------------------------------------------
  Events Schedule
-------------------------------------------*/

function bronyconSchedule() {
  if ($("#events-schedule").length) {
    $(".time-block li, .event-tooltip").each(function(){

      popoverContent = "";
      popoverContent += $(this).data("description");
      popoverContent += "Location: "+$(this).data("location")+"<br/>";
      popoverContent += "Track: "+$(this).data("track")+"<br/>";
      popoverContent += "Start Time: "+$(this).data("start-time")+"<br/>";
      popoverContent += "End Time: "+$(this).data("end-time");

      $(this).qtip({
          content: {
            text: popoverContent,
            title: {
              text: $(this).data("event-name"),
              button: true
            }
          },
          style: { classes: 'bronycon-tooltip bronycon-tooltip-orange' },
          position: {
              my: 'bottom center',
              at: 'top center',
              viewport: $(window),
              adjust: {
                method: 'flip flip'
              }
            },
          show: 'click',
          hide: 'unfocus'
        });
    });
  }

}



/*-------------------------------------------
  Vendors!
-------------------------------------------*/

function vendorMap() {
  if ($('#vendor-hall-map').length) {

    $.getScript("/js/vendor-layout.js", function() {

      $("rect[class=map-vendor-booth], path[class=map-vendor-booth]").each(function() {
        var boothNumber = $(this).data("booth"),
          boothData = vendorStore[boothNumber],
          popoverContent = "<ul class=\"unstyled vendors-at-booth\">";

        if (boothData != undefined) {
          for (i = 0; i < boothData.length; i++) {
            popoverContent += "<li>";
            popoverContent += "<header>"+boothData[i]['vendor']+"</header>";

            if (boothData[i]['website'] != null && boothData[i]['website'] != "") {
              popoverContent += "<span class=\"website\"><a href=\""+boothData[i]['website']+"\" target=\"_blank\">website</a></span>";
            }
            if (boothData[i]['items'] != null) {
              popoverContent += "<span class=\"sells\">"+boothData[i]['items'].replace(/\,/g,", ")+"</span>";
            }
            if (boothData[i]['payments'] != null) {
              popoverContent += "<span class=\"accepts\">Accepts: "+boothData[i]['payments'].replace(/\,/g,", ")+"</span>"
            }
            popoverContent += "</li>";
          }
        } else {
          popoverContent += "<li>";
          popoverContent += "<header>Open</header>";
          popoverContent += "</li>";
        }
        popoverContent += "</ul>";

        $(this).qtip({
          content: {
            text: popoverContent,
            title: {
              text: "Booth "+boothNumber,
              button: true
            }
          },
          style: {
            classes: 'qtip-light qtip-vendor'
          },
          position: {
              my: 'bottom left',
              at: 'top left',
              viewport: $(window),
              adjust: {
                method: 'flip flip'
              }
            },
          show: 'click',
          hide: 'unfocus',
          events: {
            show: function(){
              $(".map-vendor-booth-shape.selected").attr("class","map-vendor-booth-shape");
              $(".map-vendor-booth-shape[data-booth-shape='"+boothNumber+"']").attr("class","map-vendor-booth-shape selected");
            }
          },
          style: { classes: 'bronycon-tooltip' }
        });

      });

      $(".map-vendor-booth").hover(function(){
        bn = $(this).data('booth');
        $(".map-vendor-booth-shape:not(.selected)[data-booth-shape='"+bn+"']").attr("class","map-vendor-booth-shape active");
      }, function(){
        bn = $(this).data('booth');
          $(".map-vendor-booth-shape:not(.selected)[data-booth-shape='"+bn+"']").attr("class","map-vendor-booth-shape");
      });

    });
  }
}