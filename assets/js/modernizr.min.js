/*!
 * modernizr v3.6.0
 * Build https://modernizr.com/download?-webp-webplossless_webp_lossless-setclasses-dontmin
 *
 * Copyright (c)
 *  Faruk Ates
 *  Paul Irish
 *  Alex Sexton
 *  Ryan Seddon
 *  Patrick Kettner
 *  Stu Cox
 *  Richard Herrera

 * MIT License
 */
!function(A,e,n){var o=[],a=[],t={_version:"3.6.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(A,e){var n=this;setTimeout((function(){e(n[A])}),0)},addTest:function(A,e,n){a.push({name:A,fn:e,options:n})},addAsyncTest:function(A){a.push({name:null,fn:A})}},s=function(){};function i(A,e){return typeof A===e}s.prototype=t,s=new s;var l,r,f=e.documentElement,u="svg"===f.nodeName.toLowerCase();function c(A){var e=f.className,n=s._config.classPrefix||"";if(u&&(e=e.baseVal),s._config.enableJSClass){var o=new RegExp("(^|\\s)"+n+"no-js(\\s|$)");e=e.replace(o,"$1"+n+"js$2")}s._config.enableClasses&&(e+=" "+n+A.join(" "+n),u?f.className.baseVal=e:f.className=e)}function p(A,e){if("object"==typeof A)for(var n in A)l(A,n)&&p(n,A[n]);else{var o=(A=A.toLowerCase()).split("."),a=s[o[0]];if(2==o.length&&(a=a[o[1]]),void 0!==a)return s;e="function"==typeof e?e():e,1==o.length?s[o[0]]=e:(!s[o[0]]||s[o[0]]instanceof Boolean||(s[o[0]]=new Boolean(s[o[0]])),s[o[0]][o[1]]=e),c([(e&&0!=e?"":"no-")+o.join("-")]),s._trigger(A,e)}return s}l=i(r={}.hasOwnProperty,"undefined")||i(r.call,"undefined")?function(A,e){return e in A&&i(A.constructor.prototype[e],"undefined")}:function(A,e){return r.call(A,e)},t._l={},t.on=function(A,e){this._l[A]||(this._l[A]=[]),this._l[A].push(e),s.hasOwnProperty(A)&&setTimeout((function(){s._trigger(A,s[A])}),0)},t._trigger=function(A,e){if(this._l[A]){var n=this._l[A];setTimeout((function(){var A;for(A=0;A<n.length;A++)(0,n[A])(e)}),0),delete this._l[A]}},s._q.push((function(){t.addTest=p})),
/*!
{
  "name": "Webp Lossless",
  "async": true,
  "property": ["webplossless", "webp-lossless"],
  "tags": ["image"],
  "authors": ["@amandeep", "Rich Bradshaw", "Ryan Seddon", "Paul Irish"],
  "notes": [{
    "name": "Webp Info",
    "href": "https://developers.google.com/speed/webp/"
  },{
    "name": "Webp Lossless Spec",
    "href": "https://developers.google.com/speed/webp/docs/webp_lossless_bitstream_specification"
  }]
}
!*/
s.addAsyncTest((function(){var A=new Image;A.onerror=function(){p("webplossless",!1)},A.onload=function(){p("webplossless",1==A.width)},A.src="data:image/webp;base64,UklGRh4AAABXRUJQVlA4TBEAAAAvAAAAAAfQ//73v/+BiOh/AAA="})),
/*!
{
  "name": "Webp",
  "async": true,
  "property": "webp",
  "tags": ["image"],
  "builderAliases": ["img_webp"],
  "authors": ["Krister Kari", "@amandeep", "Rich Bradshaw", "Ryan Seddon", "Paul Irish"],
  "notes": [{
    "name": "Webp Info",
    "href": "https://developers.google.com/speed/webp/"
  }, {
    "name": "Chormium blog - Chrome 32 Beta: Animated WebP images and faster Chrome for Android touch input",
    "href": "https://blog.chromium.org/2013/11/chrome-32-beta-animated-webp-images-and.html"
  }, {
    "name": "Webp Lossless Spec",
    "href": "https://developers.google.com/speed/webp/docs/webp_lossless_bitstream_specification"
  }, {
    "name": "Article about WebP support on Android browsers",
    "href": "http://www.wope-framework.com/en/2013/06/24/webp-support-on-android-browsers/"
  }, {
    "name": "Chormium WebP announcement",
    "href": "https://blog.chromium.org/2011/11/lossless-and-transparency-encoding-in.html?m=1"
  }]
}
!*/
s.addAsyncTest((function(){var A=[{uri:"data:image/webp;base64,UklGRiQAAABXRUJQVlA4IBgAAAAwAQCdASoBAAEAAwA0JaQAA3AA/vuUAAA=",name:"webp"},{uri:"data:image/webp;base64,UklGRkoAAABXRUJQVlA4WAoAAAAQAAAAAAAAAAAAQUxQSAwAAAABBxAR/Q9ERP8DAABWUDggGAAAADABAJ0BKgEAAQADADQlpAADcAD++/1QAA==",name:"webp.alpha"},{uri:"data:image/webp;base64,UklGRlIAAABXRUJQVlA4WAoAAAASAAAAAAAAAAAAQU5JTQYAAAD/////AABBTk1GJgAAAAAAAAAAAAAAAAAAAGQAAABWUDhMDQAAAC8AAAAQBxAREYiI/gcA",name:"webp.animation"},{uri:"data:image/webp;base64,UklGRh4AAABXRUJQVlA4TBEAAAAvAAAAAAfQ//73v/+BiOh/AAA=",name:"webp.lossless"}],e=A.shift();function n(A,e,n){var o=new Image;function a(e){var a=!(!e||"load"!==e.type)&&1==o.width;p(A,"webp"===A&&a?new Boolean(a):a),n&&n(e)}o.onerror=a,o.onload=a,o.src=e}n(e.name,e.uri,(function(e){if(e&&"load"===e.type)for(var o=0;o<A.length;o++)n(A[o].name,A[o].uri)}))})),function(){var A,e,n,t,l,r;for(var f in a)if(a.hasOwnProperty(f)){if(A=[],(e=a[f]).name&&(A.push(e.name.toLowerCase()),e.options&&e.options.aliases&&e.options.aliases.length))for(n=0;n<e.options.aliases.length;n++)A.push(e.options.aliases[n].toLowerCase());for(t=i(e.fn,"function")?e.fn():e.fn,l=0;l<A.length;l++)1===(r=A[l].split(".")).length?s[r[0]]=t:(!s[r[0]]||s[r[0]]instanceof Boolean||(s[r[0]]=new Boolean(s[r[0]])),s[r[0]][r[1]]=t),o.push((t?"":"no-")+r.join("-"))}}(),c(o),delete t.addTest,delete t.addAsyncTest;for(var d=0;d<s._q.length;d++)s._q[d]();A.Modernizr=s}(window,document);