# Security checklist

 * [ ] *Always* change symfony's default secret in app/config/parameters.yml
     * This secret is used to (reversibly) encrypt the SonataAdminBundle's remeber-me cookie, so a known token and username allows anyone to forge a valid cookie
 * [ ] When using Redactor outside the admin area, implement the [HTMLPurifier bundle](https://github.com/Exercise/HTMLPurifierBundle) to prevent XSS
 * [ ] Double-check whether debug output is limited on production environments.  
     * Particularly when coding a custom exception formatter for the FHRestBundle, limit the information provided by checking the `kernel.debug` parameter for the current debug level.
 * [ ] Update all dependencies on every development sprint
     * `composer update` should suffice in most cases
     * Also be sure to check if the current Symfony version is still maintained 
          * Symfony 2.7 and 2.8 are the current 2.x LTS releases, and are maintained until somewhere in 2018
          * Symfony 3.4 is the current 3.x LTS release, and is supported until the end of 2020 
 * [ ] Check [the Symfony security advisories](https://symfony.com/blog/category/security-advisories) when starting development.
     * If a security advisory has been released *after* the last development sprint for a project, an update is absolutely necessary.
 * [ ] Force HTTPS wherever possible
     * Also use HSTS whenever possible, to prevent SSL/TLS [Downgrade attacks](https://en.wikipedia.org/wiki/Downgrade_attack)
 * [ ] Do your contact forms/submission forms have a Captcha and/or honeypot?
     * Ask @martinbroos for more details on the honeypot
 * [ ] Set a secure password for the freshheads user on staging and production, and make sure the two are not the same
