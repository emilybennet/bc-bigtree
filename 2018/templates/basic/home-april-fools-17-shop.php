<?
  $billboardMod = new homePageBillboard();
  $billboards = $billboardMod->getApproved('position DESC');

  $anonPony = $cms->getSetting('anonymous-avatar');

  $guestsMod = new bcGuests();
  $guests = $guestsMod->getMatching(
    array('approved','featured'),
    array('on','on'),
    'position DESC');
?>

<section class="header-band home">
    <div class="tab-wrapper">
        <h3>
            <span>August 11–13, 2017</span>
            <span>Baltimore, Maryland</span>
        </h3>
    </div>
</section>

<section class="sub-box-home" style="">
    <div class="wrap">
        <div class="hero-wrap">
            <img src="/images/tmp/april-sale-fg.png" alt="BronyCon Con Crate logo and product image" class="product-hero">
        </div>

        <div class="buy-island">
            <span class="price-tag">$70.00 + Shipping</span>
            <div id="product-component-759010174c3" class="buy-button"></div>

        </div>



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
                id: [9077007241],
                node: document.getElementById('product-component-759010174c3'),
                moneyFormat: '%24%7B%7Bamount%7D%7D',
                options: {
          "product": {
            "variantId": "all",
            "width": "240px",
            "contents": {
              "img": false,
              "imgWithCarousel": false,
              "title": false,
              "variantTitle": false,
              "price": false,
              "description": false,
              "buttonWithQuantity": false,
              "quantity": false
            },
            "styles": {
              "product": {
                "text-align": "left",
                "@media (min-width: 601px)": {
                  "max-width": "100%",
                  "margin-left": "20px",
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
              "compareAt": {
                "font-size": "12px"
              }
            }
          },
          "cart": {
            "contents": {
              "button": true
            },
            "styles": {
              "button": {
                "background-color": "#5a3791",
                ":hover": {
                  "background-color": "#513283"
                },
                ":focus": {
                  "background-color": "#513283"
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
                "background-color": "#5a3791",
                ":hover": {
                  "background-color": "#513283"
                },
                ":focus": {
                  "background-color": "#513283"
                }
              }
            }
          },
          "toggle": {
            "styles": {
              "toggle": {
                "background-color": "#5a3791",
                ":hover": {
                  "background-color": "#513283"
                },
                ":focus": {
                  "background-color": "#513283"
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

    </div>
</section>


<section class="dateline blue-band">
    <div class="wrap april-faq">
        <p>
            <span class="question">Is this for real?</span>
            Yep. You give us money, we send you the thing.
        </p>
        <p>
            <span class="question">What&apos;s in the Box?</span>
            First off, this is a fine piece of BronyCon-branded corrugation. Once you get past that you&CloseCurlyQuote;ll discover a sweet <em>Mane Universe</em> t-shirt, a never-before seen collaboration between <a href="http://pepooni.deviantart.com/" target="_blank">Pepooni</a> and <a href="http://kibbiethegreat.deviantart.com/" target="_blank">Kibbie</a> in poster form, some tastes of Baltimore (complements of the Berger Cookies bakery and UTZ Quality Foods), a few stickers, a BronyCon lanyard to get you excited for August, and a unique pre-paid code for a standard 3-Day badge.
        </p>
        <p>
            <span class="question">This seems like a good deal&mdash;a REALLY good deal.</span>
            We know! A t-shirt, poster, stickers, and snacks for the price of a badge. All your friends will be jelly.
        </p>
        <p>
            <span class="question">Who would buy this?</span>
            Not sure&hellip; our guess is either a superfan of BronyCon or someone looking to buy a badge at a really good rate.
        </p>
        <p>
            <span class="question">What size is the t-shirt?</span>
            Extra Large. If that doesn&CloseCurlyQuote;t work for you, #sorrynotsorry, share the love and give it to a friend. :)
        </p>
        <p>
            <span class="question">Is this the shirt or poster Sponsors will be getting at the con?</span>
            Nope!
        </p>
        <p>
            <span class="question">What will they be getting then?</span>
            <a href="https://www.youtube.com/watch?v=vQTp8Ozj1JQ" target="_blank">
                <em>&ldquo;Spoilers!&CloseCurlyDoubleQuote;</em>
            </a>
        </p>
        <p>
            <span class="question">When will I get my box?</span>
            We will send you tracking digits a few hours after you check out. Your box will be placed in the loving hands of the United States Postal Service on Monday (April 3rd) and it will be in your home or office a few days later (we ship Priority Mail).
        </p>
        <p>
            <span class="question">I&CloseCurlyQuote;m outside the States, will you send it to me?</span>
            Sure! Keep in mind it might take a bit longer to get to you and any local import fees, taxes, or VATs are on your dime. Because it takes more unicorn magic to send things internationally postage will be a bit higher but we&CloseCurlyQuote;ll send via International First Class to try and keep costs down.
        </p>
        <p>
            <span class="question">Even Russia?</span>
            We guess&hellip; though if customs decides to keep your box&hellip; that's on you.&hellip;&hellip; &macr;\_(ツ)_/&macr;
        </p>
        <p>
            <span class="question">You know, I changed my mind&hellip; can I get a refund?</span>
            Nope! Due to the consumable nature of pretty much everything in the box, it&CloseCurlyQuote;s sold as-is.
        </p>
        <p>
            <span class="question">What if I already registered for the con, can I get a refund?</span>
            Nope, we don't refund registrations. Maybe you can sell the code that comes in the box or transfer your existing registration to someone else.
        </p>
        <p>
            <span class="question">Can I get a Sponsor badge instead?</span>
            Hm&hellip; sure, we can make that happen. After you check out send your order number and what Sponsor level you would like to <a href="mailto:swag@bronycon.org">swag@bronycon.org</a>. We'll tweak the badge code assigned to your box to discount the desired Sponsor level $35.
        </p>
        <p>
            <span class="question">Sponsor badges are only discounted $35? Why not $70??</span>
            Because we're not going to give you everything in the box plus the Sponsor perks for the price of a single Sponsor badge. Nice try ;-)
        </p>
        <p>
            <span class="question">When do vendor invoices go out?</span>
            Soon-ish, maybe in the next week or so. If you got an acceptance email, you&CloseCurlyQuote;re good&hellip; you don&CloseCurlyQuote;t owe us money yet, so chill. :-)
        </p>
        <p>
            <span class="question">What about panel acceptances? </span>
            That application closed like yesterday. Give us some time to sift through and reject the bad ones first. You&CloseCurlyQuote;ll hear from us in like maybe a month?
        </p>

        <p>
            <span class="question">When does Rick and Morty season 3 come out?</span>
            IDK, why are you asking <em>us</em>??
        </p>

    </div>
</section>


<style>
    .sub-box-home {
        background: url('/images/tmp/april-sale-bg.png') no-repeat #de4b2b;
        background-size: cover;
        padding: 125px 0 140px;
    }
    .sub-box-home .hero-wrap {
        width: 100%;
        padding-right: 0px;
        box-sizing: border-box;
    }
    .sub-box-home .product-hero {
        width: 100%;
    }
    .shopify-buy__product-img-wrapper {
        display: none !important;
    }
    .buy-island {
        margin-top: 20px;
    }
    .buy-island .price-tag {
        font-size: 25px;
        line-height: 42px;
        padding-top: 19px;
        margin-right: 20px;
        font-family: "museo-slab", georgia, serif;
        font-weight: 700;
        color: white;
    }
    .buy-island .buy-button {
        display: inline-block;
    }
    .buy-island .btn-disabled {
        margin-top: 20px;
    }
    .april-faq {
        text-align: left;
        font-size: 14px;
    }
    .april-faq p {
        font-style: normal;
        max-width: 800px;
        margin-bottom: 15px;
    }
    .april-faq a {
        color: #5A3791;
        transition: color .2s;
    }
    .april-faq a:hover {
        color: #96288C;
    }
    .april-faq .question {
        display: block;
        font-weight: bold;
    }
    @media only screen and (min-width: 550px) {
        .buy-island {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    }
    @media only screen and (min-width: 850px) {
        .sub-box-home .hero-wrap {
            padding-right: 50px;
        }
    }
</style>
