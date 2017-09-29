# Basics

* [ ] **Favicons**

    * [Real Favicon Generator](https://realfavicongenerator.net)

* [ ] **non www to www redirect**

```
    RewriteCond %{HTTP_HOST} ^yourdomain.nl$ [NC]
    RewriteRule ^(.*)$ https://www.yourdomain.nl/$1 [L,R=301]
```

* [ ] **Cookie notification**

    * Ask yourself if data is collected from users by external scripts like facebook pixel or hotjar.
If so discuss with client that a cookie notification is needed.
    * There a 2 ways of implementating a cookie notification.
        ** Only notify that cookies are being used
        ** Give user option to disable cookies that are being used on site

* [ ] **Browser checks**

    * Each new UI component should be tested in the project required browsers.
    ** This can be done using [BrowserStack](browserstack.com)

* [ ] **Style Error pages**

    * 404 / 500 pages should be styled, and have links back to homepage.

* [ ] **Mails masken**

    * Development and Testing environment should not be able to send mails to clients or customers.
    ** Use MailHog and a custom swiftmailer delivery address.

* [ ] **Asset expire headers**

    * Check if the asset expire headers are set in .htaccess or in server config files. 

## Optional

* [ ] **Open Graph tags**

    * Supply additional open graph meta tags to give social media sites more information.

```
<meta property="og:title" content="Facebook Open Graph META Tags"/>
<meta property="og:image" content="https://domain.com/facebooklogo.png"/>
<meta property="og:site_name" content="Site Name"/>
<meta property="og:description" content="Facebook's Open Graph protocol allows for web developers to turn t
<meta name=“twitter:card” content=“summary_large_image” />
<meta name=“twitter:site” content=“@twitterchannel” /> 
```

More information can be found here:
- [Facebook Open Graph docs](https://developers.facebook.com/docs/sharing/opengraph)

* [ ] **Code tests**

    * Before starting development process think about the need of testing your code. This can be done by writing tests for backend and frontend code.

*@todo Add some links with information about testing strategies / tools*
* [Sentry](https://sentry.io/freshheads/)

* [ ] **Measurement plan**

    * Check with client if he wants to track certain custom events

* [ ] **Translations**

    * Check with client if site will be multi language. If so start by adding all texts into translation files.
