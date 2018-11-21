<?
$bigtree['layout'] = 'blank';
?>

  <!DOCTYPE html>
  <html>

  <head>
    <title>BronyCon Swag Shop</title>
    <meta name="robots" content="noindex,nofollow">
    <meta name="googlebot" content="noindex">
    <link rel="shortcut icon" href="/favicon.png">
    <!-- <link rel="stylesheet" href="/css/bc.css" type="text/css" media="all"> -->
    <style>
      html {
        font-family: sans-serif;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%
      }

      body {
        margin: 0
      }

      article,
      details,
      section,
      summary,
      aside,
      main,
      menu,
      nav,
      figcaption,
      figure,
      footer,
      header,
      hgroup {
        display: block
      }

      audio,
      canvas,
      progress,
      video {
        display: inline-block;
        vertical-align: baseline
      }

      audio:not([controls]) {
        display: none;
        height: 0
      }

      [hidden],
      template {
        display: none
      }

      a {
        background-color: transparent;
      }

      a:active,
      a:hover {
        outline: 0
      }

      abbr[title] {
        border-bottom: 1px dotted
      }

      dfn {
        font-style: italic
      }

      mark {
        background: #ff0;
        color: #000
      }

      b,
      strong {
        font-weight: bold
      }

      h1 {
        font-size: 2em;
        margin: .67em 0
      }

      small {
        font-size: 80%
      }

      sub,
      sup {
        font-size: 75%;
        line-height: 0;
        position: relative;
        vertical-align: baseline
      }

      sup {
        top: -.5em
      }

      sub {
        bottom: -.25em
      }

      img {
        border: 0
      }

      svg:not(:root) {
        overflow: hidden
      }

      figure {
        margin: 1em 40px
      }

      hr {
        -moz-box-sizing: content-box;
        -webkit-box-sizing: content-box;
        -moz-box-sizing: content-box;
        box-sizing: content-box;
        height: 0
      }

      pre {
        overflow: auto
      }

      code,
      kbd,
      pre,
      samp {
        font-family: monospace, monospace;
        font-size: 1em
      }

      button,
      input,
      optgroup,
      select,
      textarea {
        color: inherit;
        font: inherit;
        margin: 0
      }

      button {
        overflow: visible
      }

      button,
      select {
        text-transform: none
      }

      button,
      html input[type='button'],
      input[type='reset'],
      input[type='submit'] {
        cursor: pointer;
        -webkit-appearance: button
      }

      button[disabled],
      html input[disabled] {
        cursor: default
      }

      button::-moz-focus-inner,
      input::-moz-focus-inner {
        border: 0;
        padding: 0
      }

      input {
        line-height: normal
      }

      input[type='checkbox'],
      input[type='radio'] {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        padding: 0
      }

      input[type='number']::-webkit-inner-spin-button,
      input[type='number']::-webkit-outer-spin-button {
        height: auto
      }

      input[type='search'] {
        -webkit-appearance: textfield;
        -moz-box-sizing: content-box;
        -webkit-box-sizing: content-box;
        -webkit-box-sizing: content-box;
        -moz-box-sizing: content-box;
        box-sizing: content-box
      }

      input[type='search']::-webkit-search-cancel-button,
      input[type='search']::-webkit-search-decoration {
        -webkit-appearance: none
      }

      fieldset {
        border: 1px solid #c0c0c0;
        margin: 0 2px;
        padding: .35em .625em .75em
      }

      legend {
        border: 0;
        padding: 0
      }

      textarea {
        overflow: auto
      }

      optgroup {
        font-weight: bold
      }

      table {
        border-collapse: collapse;
        border-spacing: 0
      }

      td,
      th {
        padding: 0
      }

      @font-face {
        font-family: 'proxima-nova';
        src: url("/type/proxima-nova-regular.eot");
        src: url("/type/proxima-nova-regular.eot?#iefix") format('embedded-opentype'), url("/type/proxima-nova-regular.woff") format('woff'), url("/type/proxima-nova-regular.ttf") format('truetype');
        font-weight: normal;
        font-style: normal
      }

      @font-face {
        font-family: 'proxima-nova';
        src: url("/type/proxima-nova-italic.eot");
        src: url("/type/proxima-nova-italic.eot?#iefix") format('embedded-opentype'), url("/type/proxima-nova-italic.woff") format('woff'), url("/type/proxima-nova-italic.ttf") format('truetype');
        font-weight: normal;
        font-style: italic
      }

      @font-face {
        font-family: 'proxima-nova';
        src: url("/type/proxima-nova-bold.eot");
        src: url("/type/proxima-nova-bold.eot?#iefix") format('embedded-opentype'), url("/type/proxima-nova-bold.woff") format('woff'), url("/type/proxima-nova-bold.ttf") format('truetype');
        font-weight: bold;
        font-style: normal
      }

      @font-face {
        font-family: 'proxima-nova';
        src: url("/type/proxima-nova-bold-italic.eot");
        src: url("/type/proxima-nova-bold-italic.eot?#iefix") format('embedded-opentype'), url("/type/proxima-nova-bold-italic.woff") format('woff'), url("/type/proxima-nova-bold-italic.ttf") format('truetype');
        font-weight: bold;
        font-style: italic
      }

      @font-face {
        font-family: 'proxima-nova-condensed';
        src: url("/type/proxima-nova-condensed-semibold.eot");
        src: url("/type/proxima-nova-condensed-semibold.eot?#iefix") format('embedded-opentype'), url("/type/proxima-nova-condensed-semibold.woff") format('woff'), url("/type/proxima-nova-condensed-semibold.ttf") format('truetype');
        font-weight: 500
      }

      body {
        background: url("/images/bc-patterns-violet.png") #5a3791 repeat;
        font-family: 'proxima-nova', helvetica, sans-serif;
        color: #fff;
        text-align: center;
        min-height: 100vh;
        display: -webkit-box;
        display: -moz-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: box;
        display: flex;
        -webkit-box-align: center;
        -moz-box-align: center;
        -o-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
        -webkit-box-pack: center;
        -moz-box-pack: center;
        -o-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center
      }

      .bc-logo {
        width: 300px
      }

      a {
        cursor: pointer
      }

      .btn {
        display: inline-block;
        padding: 10px 15px 8px;
        background: #fff;
        color: #5a3791;
        text-decoration: none;
        font-size: 1.2em;
        -webkit-transition: 0.2s all;
        -moz-transition: 0.2s all;
        -o-transition: 0.2s all;
        -ms-transition: 0.2s all;
        transition: 0.2s all;
      }

      .btn:hover {
        background: #dcdcdc
      }

      .btn.btn-int {
        font-size: .8em
      }

      .interest .liner {
        border-top: 1px dashed #fff;
        border-bottom: 1px dashed #fff;
        margin: 50px auto 10px;
        max-width: 500px;
        padding-bottom: 15px
      }

      .interest .btn {
        margin-bottom: 10px
      }

      .last-year {
        text-decoration: none;
        color: #fff;
        font-size: .8em
      }

      body.shopify-embed main {
        background: #fff;
        color: #333333;
        border-radius: 3px;
        -webkit-box-shadow: 0 3px 5px rgba(0, 0, 0, 0.25);
        box-shadow: 0 3px 5px rgba(0, 0, 0, 0.25);
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        min-width: 650px;
        padding: 30px
      }
    </style>
  </head>

  <body class="shopify-embed">
    <main>
      <div id='product-component-ff7ce4e68c8'></div>
      <!-- <p>Ordering is now closed.</p> -->
    </main>

    <script type="text/javascript">
    /*<![CDATA[*/

    (function () {
      var scriptURL = 'https://sdks.shopifycdn.com/buy-button/latest/buy-button-storefront.min.js';
      if (window.ShopifyBuy) {
        if (window.ShopifyBuy.UI) {
          ShopifyBuyInit();
        } else {
          loadScript();
        }
      } else {
        loadScript();
      }

      function loadScript() {
        var script = document.createElement('script');
        script.async = true;
        script.src = scriptURL;
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(script);
        script.onload = ShopifyBuyInit;
      }

      function ShopifyBuyInit() {
        var client = ShopifyBuy.buildClient({
          domain: 'bcconstore.myshopify.com',
          apiKey: <?=$_SERVER['BIGTREE_SHOPIFY_APIKEY']?>,
          appId: '6',
        });

        ShopifyBuy.UI.onReady(client).then(function (ui) {
          ui.createComponent('product', {
            id: [1333637644344],
            node: document.getElementById('product-component-ff7ce4e68c8'),
            moneyFormat: '%24%7B%7Bamount%7D%7D',
            options: {
      "product": {
        "layout": "horizontal",
        "variantId": "all",
        "width": "100%",
        "contents": {
          "img": false,
          "imgWithCarousel": true,
          "variantTitle": false,
          "description": true,
          "buttonWithQuantity": false,
          "quantity": false
        },
        "text": {
          "button": "Order The Box"
        },
        "styles": {
          "product": {
            "text-align": "left",
            "@media (min-width: 601px)": {
              "max-width": "100%",
              "margin-left": "0",
              "margin-bottom": "50px"
            }
          },
          "button": {
            "background-color": "#5a3791",
            ":hover": {
              "background-color": "#513283"
            },
            ":focus": {
              "background-color": "#513283"
            }
          },
          "title": {
            "font-size": "26px"
          },
          "price": {
            "font-size": "18px"
          },
          "compareAt": {
            "font-size": "15px"
          }
        }
      },
      "cart": {
        "contents": {
          "button": true
        },
        "styles": {
          "button": {
            "background-color": "#F68B28",
            ":hover": {
              "background-color": "#F68B28"
            },
            ":focus": {
              "background-color": "#F68B28"
            }
          },
          "footer": {
            "background-color": "#ffffff"
          }
        }
      },
      "modalProduct": {
        "contents": {
          "img": false,
          "imgWithCarousel": true,
          "variantTitle": false,
          "buttonWithQuantity": true,
          "button": false,
          "quantity": false
        },
        "styles": {
          "product": {
            "@media (min-width: 601px)": {
              "max-width": "100%",
              "margin-left": "0px",
              "margin-bottom": "0px"
            }
          },
          "button": {
            "background-color": "#F68B28",
            ":hover": {
              "background-color": "#F68B28"
            },
            ":focus": {
              "background-color": "#F68B28"
            }
          }
        }
      },
      "toggle": {
        "styles": {
          "toggle": {
            "background-color": "#F68B28",
            ":hover": {
              "background-color": "#F68B28"
            },
            ":focus": {
              "background-color": "#F68B28"
            }
          }
        }
      },
      "productSet": {
        "styles": {
          "products": {
            "@media (min-width: 601px)": {
              "margin-left": "-20px"
            }
          }
        }
      }
    }
          });
        });
      }
    })();
    /*]]>*/
    </script>

  </body>

  </html>

