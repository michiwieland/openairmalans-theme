/*!
 * MoveTo - A lightweight scroll animation javascript library without any dependency.
 * Version 1.5.3 (24-03-2017 14:41)
 * Licensed under MIT
 * Copyright 2017 Hasan Aydoğdu <hsnaydd@gmail.com>
 */

"use strict";var MoveTo=function(){function t(t,e,n,o){return t/=o,t--,-n*(t*t*t*t-1)+e}function e(t){for(var e=0,n=0;t;)e+=t.offsetTop,n+=t.offsetLeft,t=t.offsetParent;return{top:e,left:n}}function n(t,e){var n={};return Object.keys(t).forEach(function(e){n[e]=t[e]}),Object.keys(e).forEach(function(t){n[t]=e[t]}),n}function o(t){return t.replace(/([A-Z])/g,function(t){return"-"+t.toLowerCase()})}function r(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},o=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};this.options=n(a,e),this.easeFunctions=n({easeOutQuart:t},o)}function i(t,e){var n={};return Object.keys(e).forEach(function(e){var r=t.getAttribute("data-mt-"+o(e));r&&(n[e]=isNaN(r)?r:parseInt(r,10))}),n}var a={tolerance:0,duration:800,easing:"easeOutQuart",callback:function(){}};return r.prototype.registerTrigger=function(t,e){var o=this;if(t){var r=t.getAttribute("href")||t.getAttribute("data-target"),a=r&&"#"!==r?document.getElementById(r.substring(1)):0,u=n(this.options,i(t,this.options));"function"==typeof e&&(u.callback=e),t.addEventListener("click",function(t){t.preventDefault(),o.move(a,u)})}},r.prototype.move=function(t){var o=this,r=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};if(0===t||t){r=n(this.options,r);var i="number"==typeof t?t:e(t).top,a=window.pageYOffset;i-=r.tolerance;var u=i-a,c=null,s=void 0,f=function e(n){var f=window.pageYOffset;c||(c=n-1);var v=n-c;if(s&&(s===f||u>0&&s>f||u<0&&s<f))return r.callback(t);s=f;var d=o.easeFunctions[r.easing](v,a,u,r.duration);window.scroll(0,d),v<r.duration?window.requestAnimationFrame(e):(window.scroll(0,i),r.callback(t))};window.requestAnimationFrame(f)}},r.prototype.addEaseFunction=function(t,e){this.easeFunctions[t]=e},r}();"undefined"!=typeof module?module.exports=MoveTo:window.MoveTo=MoveTo;
