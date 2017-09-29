Performance
==========

* [ ] **Image optimalisation**
    * Set right image upload config 
        * Strip meta
        * Quality: ~80
        * Define a max width to prevent unnecessary large images
    
* [ ] **Define image sizes for each device**    
    * Create thumbs for mobile / tablet
    * Discuss if retina images are added value
    * Load by using srcset or picture element 
        ** This needs a polyfill for IE can be combined with [lazyload](https://github.com/aFarkas/lazysizes)
    
* [ ] Pagespeed test

    * [PageSpeed Insight](https://developers.google.com/speed/pagespeed/insights/)
    * [Team Tool](https://team.freshheads.local/)
    
## Optional
    
* [ ] **Lazyload Images**    

* To improve initial page speed. Use [Lazysizes](https://github.com/aFarkas/lazysizes) for easy implementation.

* [ ] **Speed Test Tools**
    * [Blackfire](https://blackfire.io/)

[ ] **Varnish Cache**

[ ] **SF Cache**
