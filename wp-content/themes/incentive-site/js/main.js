/**
 * @license
 * Lodash (Custom Build) lodash.com/license | Underscore.js 1.8.3 underscorejs.org/LICENSE
 * Build: `lodash include="throttle"`
 */
;(function(){function t(){}function e(t){return null==t?t===l?d:y:I&&I in Object(t)?n(t):r(t)}function n(t){var e=$.call(t,I),n=t[I];try{t[I]=l;var r=true}catch(t){}var o=_.call(t);return r&&(e?t[I]=n:delete t[I]),o}function r(t){return _.call(t)}function o(t,e,n){function r(e){var n=d,r=g;return d=g=l,x=e,v=t.apply(r,n)}function o(t){return x=t,O=setTimeout(c,e),T?r(t):v}function i(t){var n=t-h,r=t-x,o=e-n;return w?k(o,j-r):o}function f(t){var n=t-h,r=t-x;return h===l||n>=e||n<0||w&&r>=j}function c(){
  var t=D();return f(t)?p(t):(O=setTimeout(c,i(t)),l)}function p(t){return O=l,S&&d?r(t):(d=g=l,v)}function s(){O!==l&&clearTimeout(O),x=0,d=h=g=O=l}function y(){return O===l?v:p(D())}function m(){var t=D(),n=f(t);if(d=arguments,g=this,h=t,n){if(O===l)return o(h);if(w)return O=setTimeout(c,e),r(h)}return O===l&&(O=setTimeout(c,e)),v}var d,g,j,v,O,h,x=0,T=false,w=false,S=true;if(typeof t!="function")throw new TypeError(b);return e=a(e)||0,u(n)&&(T=!!n.leading,w="maxWait"in n,j=w?M(a(n.maxWait)||0,e):j,S="trailing"in n?!!n.trailing:S),
  m.cancel=s,m.flush=y,m}function i(t,e,n){var r=true,i=true;if(typeof t!="function")throw new TypeError(b);return u(n)&&(r="leading"in n?!!n.leading:r,i="trailing"in n?!!n.trailing:i),o(t,e,{leading:r,maxWait:e,trailing:i})}function u(t){var e=typeof t;return null!=t&&("object"==e||"function"==e)}function f(t){return null!=t&&typeof t=="object"}function c(t){return typeof t=="symbol"||f(t)&&e(t)==m}function a(t){if(typeof t=="number")return t;if(c(t))return s;if(u(t)){var e=typeof t.valueOf=="function"?t.valueOf():t;
  t=u(e)?e+"":e}if(typeof t!="string")return 0===t?t:+t;t=t.replace(g,"");var n=v.test(t);return n||O.test(t)?h(t.slice(2),n?2:8):j.test(t)?s:+t}var l,p="4.17.5",b="Expected a function",s=NaN,y="[object Null]",m="[object Symbol]",d="[object Undefined]",g=/^\s+|\s+$/g,j=/^[-+]0x[0-9a-f]+$/i,v=/^0b[01]+$/i,O=/^0o[0-7]+$/i,h=parseInt,x=typeof global=="object"&&global&&global.Object===Object&&global,T=typeof self=="object"&&self&&self.Object===Object&&self,w=x||T||Function("return this")(),S=typeof exports=="object"&&exports&&!exports.nodeType&&exports,N=S&&typeof module=="object"&&module&&!module.nodeType&&module,E=Object.prototype,$=E.hasOwnProperty,_=E.toString,W=w.Symbol,I=W?W.toStringTag:l,M=Math.max,k=Math.min,D=function(){
  return w.Date.now()};t.debounce=o,t.throttle=i,t.isObject=u,t.isObjectLike=f,t.isSymbol=c,t.now=D,t.toNumber=a,t.VERSION=p,typeof define=="function"&&typeof define.amd=="object"&&define.amd?(w._=t, define(function(){return t})):N?((N.exports=t)._=t,S._=t):w._=t}).call(this);

// This function will run a throttled script every 300 ms
var checkHeader = _.throttle(() => { 
  console.log('checkHeader');

  // Detect scroll position
  let scrollPosition = Math.round(window.scrollY);

  var jQueryel = jQuery('.weekly-prizes');
  jQuery(window).on('scroll', function () {
      var scroll = jQuery(document).scrollTop();
      jQueryel.css({
          'background-position':'50% '+(-.25*scroll)+'px'
      });
  });

  // If we've scrolled 400px, add "sticky" class to the header
  if (scrollPosition > 400){
    if (jQuery(window).width() >= 769) {
      document.querySelector('.header__wrapper').classList.add('main-nav-toggle');
      document.querySelector('.header__logo').classList.add('header__logo-toggle');
    }
  }
  // If not, remove "sticky" class from header
  else {
      document.querySelector('.header__wrapper').classList.remove('main-nav-toggle');
      document.querySelector('.header__logo').classList.remove('header__logo-toggle');
  }
}, 300);

// Run the checkHeader function every time you scroll
window.addEventListener('scroll', checkHeader);




//Hamburger animated menu
var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};

var hamburgers = document.querySelectorAll(".hamburger");
if (hamburgers.length > 0) {
  forEach(hamburgers, function(hamburger) {
	hamburger.addEventListener("click", function() {
	  this.classList.toggle("is-active");
	}, false);
  });
}
//Hamburger animated menu



// jQuery(function() {
//   var jQueryel = jQuery('.weekly-prizes');
//   jQuery(window).on('scroll', function () {
//       var scroll = jQuery(document).scrollTop();
//       jQueryel.css({
//           'background-position':'50% '+(-.25*scroll)+'px'
//       });
//   });
// });



// var a = 0;

// jQuery(document).ready(function(){
//     setInterval(function(){
//         a = (a + 1) > 2 ? 0 : (a + 1);
//         jQuery("#a").text("Carousel-" + a + ".jpg");
//     }, 5000);
// });



// jQuery(document).ready(function() {

//     jQuery('.owl-carousel').owlCarousel({
//         loop:true,
//         margin:10,
//         nav:true,
//         animateIn: 'fadeIn',
//         animateOut: 'fadeout',
//         autoplay:true,
//         responsive:{
//             0:{
//                 items:1
//             },
//             600:{
//                 items:1
//             },
//             1000:{
//                 items:1
//             }
//         }
//     })

// });