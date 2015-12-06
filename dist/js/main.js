/*!
 * Theme Name: Fontaine v1.0.0: A lightweight theme based on the awesome front-end boilerplate called Kraken [http://github.com/cferdinandi/kraken] and WordPress framework called Keel, both by Chris Ferdinandi [http://gomakethings.com]
 * (c) 2015 Author: Vijay Rudraraju
 * MIT License
 * Theme URI: https://github.com/vjdesign/fontaine
 */

/*!
 * keel v5.4.0: A lightweight boilerplate for WordPress developers
 * (c) 2015 Chris Ferdinandi
 * MIT License
 * http://github.com/cferdinandi/keel
 */

 /*
  * classList.js: Cross-browser full element.classList implementation.
  * 1.1.20150312
  *
  * By Eli Grey, http://eligrey.com
  * License: Dedicated to the public domain.
  *   See https://github.com/eligrey/classList.js/blob/master/LICENSE.md
  */
 if("document" in self){if(!("classList" in document.createElement("_"))){(function(j){"use strict";if(!("Element" in j)){return}var a="classList",f="prototype",m=j.Element[f],b=Object,k=String[f].trim||function(){return this.replace(/^\s+|\s+$/g,"")},c=Array[f].indexOf||function(q){var p=0,o=this.length;for(;p<o;p++){if(p in this&&this[p]===q){return p}}return -1},n=function(o,p){this.name=o;this.code=DOMException[o];this.message=p},g=function(p,o){if(o===""){throw new n("SYNTAX_ERR","An invalid or illegal string was specified")}if(/\s/.test(o)){throw new n("INVALID_CHARACTER_ERR","String contains an invalid character")}return c.call(p,o)},d=function(s){var r=k.call(s.getAttribute("class")||""),q=r?r.split(/\s+/):[],p=0,o=q.length;for(;p<o;p++){this.push(q[p])}this._updateClassName=function(){s.setAttribute("class",this.toString())}},e=d[f]=[],i=function(){return new d(this)};n[f]=Error[f];e.item=function(o){return this[o]||null};e.contains=function(o){o+="";return g(this,o)!==-1};e.add=function(){var s=arguments,r=0,p=s.length,q,o=false;do{q=s[r]+"";if(g(this,q)===-1){this.push(q);o=true}}while(++r<p);if(o){this._updateClassName()}};e.remove=function(){var t=arguments,s=0,p=t.length,r,o=false,q;do{r=t[s]+"";q=g(this,r);while(q!==-1){this.splice(q,1);o=true;q=g(this,r)}}while(++s<p);if(o){this._updateClassName()}};e.toggle=function(p,q){p+="";var o=this.contains(p),r=o?q!==true&&"remove":q!==false&&"add";if(r){this[r](p)}if(q===true||q===false){return q}else{return !o}};e.toString=function(){return this.join(" ")};if(b.defineProperty){var l={get:i,enumerable:true,configurable:true};try{b.defineProperty(m,a,l)}catch(h){if(h.number===-2146823252){l.enumerable=false;b.defineProperty(m,a,l)}}}else{if(b[f].__defineGetter__){m.__defineGetter__(a,i)}}}(self))}else{(function(){var b=document.createElement("_");b.classList.add("c1","c2");if(!b.classList.contains("c2")){var c=function(e){var d=DOMTokenList.prototype[e];DOMTokenList.prototype[e]=function(h){var g,f=arguments.length;for(g=0;g<f;g++){h=arguments[g];d.call(this,h)}}};c("add");c("remove")}b.classList.toggle("c3",false);if(b.classList.contains("c3")){var a=DOMTokenList.prototype.toggle;DOMTokenList.prototype.toggle=function(d,e){if(1 in arguments&&!this.contains(d)===!e){return e}else{return a.call(this,d)}}}b=null}())}};


 /*! Houdini v8.1.0 | (c) 2015 Chris Ferdinandi | MIT License | http://github.com/cferdinandi/houdini */
 !function(t,e){"function"==typeof define&&define.amd?define([],e(t)):"object"==typeof exports?module.exports=e(t):t.houdini=e(t)}("undefined"!=typeof global?global:this.window||this.global,function(t){"use strict";var e,n={},o="querySelector"in document&&"addEventListener"in t&&"classList"in document.createElement("_"),a={selector:"[data-collapse]",toggleActiveClass:"active",contentActiveClass:"active",initClass:"js-houdini",callback:function(){}},r=function(t,e,n){if("[object Object]"===Object.prototype.toString.call(t))for(var o in t)Object.prototype.hasOwnProperty.call(t,o)&&e.call(n,t[o],o,t);else for(var a=0,r=t.length;r>a;a++)e.call(n,t[a],a,t)},c=function(){var t={},e=!1,n=0,o=arguments.length;"[object Boolean]"===Object.prototype.toString.call(arguments[0])&&(e=arguments[0],n++);for(var a=function(n){for(var o in n)Object.prototype.hasOwnProperty.call(n,o)&&(e&&"[object Object]"===Object.prototype.toString.call(n[o])?t[o]=c(!0,t[o],n[o]):t[o]=n[o])};o>n;n++){var r=arguments[n];a(r)}return t},s=function(t,e){var n,o,a=e.charAt(0);for("["===a&&(e=e.substr(1,e.length-2),n=e.split("="),n.length>1&&(o=!0,n[1]=n[1].replace(/"/g,"").replace(/'/g,"")));t&&t!==document;t=t.parentNode){if("."===a&&t.classList.contains(e.substr(1)))return t;if("#"===a&&t.id===e.substr(1))return t;if("["===a&&t.hasAttribute(n[0])){if(!o)return t;if(t.getAttribute(n[0])===n[1])return t}if(t.tagName.toLowerCase()===e)return t}return null},i=function(t,e){if(!t.classList.contains(e)){var n=t.querySelector("iframe"),o=t.querySelector("video");if(n){var a=n.src;n.src=a}o&&o.pause()}},l=function(t,e){if(!t.classList.contains(e.toggleActiveClass)&&t.hasAttribute("data-group")){var n=t.getAttribute("data-group"),o=document.querySelectorAll('[data-group="'+n+'"]');r(o,function(t){var n=document.querySelector(t.getAttribute("data-collapse"));t.classList.remove(e.toggleActiveClass),n.classList.remove(e.contentActiveClass)})}};n.toggleContent=function(t,e,n){var o=c(o||a,n||{}),r=document.querySelector(e);l(t,o),t.classList.toggle(o.toggleActiveClass),r.classList.toggle(o.contentActiveClass),i(r,o.contentActiveClass),o.callback(t,e)};var u=function(t){var o=s(t.target,e.selector);if(o){("a"===o.tagName.toLowerCase()||"button"===o.tagName.toLowerCase())&&t.preventDefault();var a=o.hasAttribute("data-collapse")?o.getAttribute("data-collapse"):o.parentNode.getAttribute("data-collapse");n.toggleContent(o,a,e)}};return n.destroy=function(){e&&(document.documentElement.classList.remove(e.initClass),document.removeEventListener("click",u,!1),e=null)},n.init=function(t){o&&(n.destroy(),e=c(a,t||{}),document.documentElement.classList.add(e.initClass),document.addEventListener("click",u,!1))},n});

 /*! Modals v8.1.0 | (c) 2015 Chris Ferdinandi | MIT License | http://github.com/cferdinandi/modals */
 !function(e,t){"function"==typeof define&&define.amd?define([],t(e)):"object"==typeof exports?module.exports=t(e):e.modals=t(e)}("undefined"!=typeof global?global:this.window||this.global,function(e){"use strict";var t,o={},n="querySelector"in document&&"addEventListener"in e&&"classList"in document.createElement("_"),l="closed",a={selectorToggle:"[data-modal]",selectorWindow:"[data-modal-window]",selectorClose:"[data-modal-close]",modalActiveClass:"active",modalBGClass:"modal-bg",backspaceClose:!0,callbackOpen:function(){},callbackClose:function(){}},c=function(e,t,o){if("[object Object]"===Object.prototype.toString.call(e))for(var n in e)Object.prototype.hasOwnProperty.call(e,n)&&t.call(o,e[n],n,e);else for(var l=0,a=e.length;a>l;l++)t.call(o,e[l],l,e)},r=function(){var e={},t=!1,o=0,n=arguments.length;"[object Boolean]"===Object.prototype.toString.call(arguments[0])&&(t=arguments[0],o++);for(var l=function(o){for(var n in o)Object.prototype.hasOwnProperty.call(o,n)&&(t&&"[object Object]"===Object.prototype.toString.call(o[n])?e[n]=r(!0,e[n],o[n]):e[n]=o[n])};n>o;o++){var a=arguments[o];l(a)}return e},s=function(e,t){var o,n,l=t.charAt(0);for("["===l&&(t=t.substr(1,t.length-2),o=t.split("="),o.length>1&&(n=!0,o[1]=o[1].replace(/"/g,"").replace(/'/g,"")));e&&e!==document;e=e.parentNode){if("."===l&&e.classList.contains(t.substr(1)))return e;if("#"===l&&e.id===t.substr(1))return e;if("["===l&&e.hasAttribute(o[0])){if(!n)return e;if(e.getAttribute(o[0])===o[1])return e}if(e.tagName.toLowerCase()===t)return e}return null},i=function(e,t){if(!e.classList.contains(t)){var o=e.querySelector("iframe"),n=e.querySelector("video");if(o){var l=o.src;o.src=l}n&&n.pause()}};o.openModal=function(e,t,o){var n=r(n||a,o||{}),c=document.querySelector(t),s=document.createElement("div");s.setAttribute("data-modal-bg",null),s.classList.add(n.modalBGClass),c.classList.add(n.modalActiveClass),document.body.appendChild(s),l="open",n.callbackOpen(e,t)},o.closeModals=function(e,t){var o=r(a,t||{}),n=document.querySelectorAll(o.selectorWindow+"."+o.modalActiveClass),s=document.querySelectorAll("[data-modal-bg]");(n.length>0||s.length>0)&&(c(n,function(e){e.classList.contains(o.modalActiveClass)&&(i(e),e.classList.remove(o.modalActiveClass))}),c(s,function(e){document.body.removeChild(e)}),l="closed",o.callbackClose())};var d=function(e){var n=e.target,a=s(n,t.selectorToggle),c=s(n,t.selectorClose),r=s(n,t.selectorWindow),i=e.keyCode;if(i&&"open"===l)(27===i||t.backspaceClose&&(8===i||46===i))&&o.closeModals(null,t);else if(n){if(r&&!c)return;a?(e.preventDefault(),o.openModal(a,a.getAttribute("data-modal"),t)):"open"===l&&(e.preventDefault(),o.closeModals(n,t))}};return o.destroy=function(){t&&(document.removeEventListener("click",d,!1),document.removeEventListener("touchstart",d,!1),document.removeEventListener("keydown",d,!1),t=null)},o.init=function(e){n&&(o.destroy(),t=r(a,e||{}),document.addEventListener("click",d,!1),document.addEventListener("touchstart",d,!1),document.addEventListener("keydown",d,!1))},o});



// http://www.sitepoint.com/the-right-way-to-make-a-dropdown-menu/

var branch;

 function dropdownMenu(navid)
 {
   var isopera = typeof window.opera != 'undefined';
   var isie = typeof document.all != 'undefined'
       && !isopera && navigator.vendor != 'KDE';
   if(isie && /msie 8/i.test(navigator.userAgent)) { isie = false; }
   var issafari = navigator.vendor == 'Apple Computer, Inc.';

   if (typeof document.getElementById == 'undefined'
       || (issafari && typeof window.XMLHttpRequest == 'undefined')
       || (isie && typeof document.uniqueID == 'undefined'))
   {
     return;
   }

   var rollover = new Image;
   //rollover.src = 'right-red.gif';
   rollover = new Image;
   //rollover.src = 'down-red.gif';

   var tree = document.getElementById(navid);
   if (tree)
   {
     var horiz = tree.className.indexOf('horizontal') != -1;
     branch = tree;
     var items = tree.getElementsByTagName('li');
     for (var i = 0; i < items.length; i++)
     {
       dropdownTrigger(tree, items[i], navid, isie, horiz);
     }

     if (!isopera)
     {
       cleanUselessWhitespace(tree);

       var keyevent = issafari || isie ? 'keydown' : 'keypress';
       attachEventListener(document, keyevent, function(e)
       {
         if(e.cmdKey || e.metaKey) { return true; }
         var target = typeof e.target != 'undefined'
             ? e.target : e.srcElement;
         if (tree.contains(target) && target.getAttribute('href'))
         {
           if (/^(37|38|39|40)$/.test(e.keyCode.toString()))
           {
             arrowKeyNavigation(tree, target, e.keyCode, horiz);

             if (typeof e.preventDefault != 'undefined')
             {
               e.preventDefault();
             }
             return false;
           }
         }
         return true;

       }, false);
     }

     var eles = typeof document.all != 'undefined'
         ? document.all : document.getElementsByTagName('*');
     for (i = 0; i < eles.length; i++)
     {
       attachEventListener(eles[i], 'focus', function(e)
       {
         var target = typeof e.target != 'undefined'
             ? e.target : e.srcElement;
         if (!tree.contains(target))
         {
           resetSiblingBranches(items[0]);
         }
       }, false);
     }

     if (!isie)
     {
       tree.contains = function(node)
       {
         if (node == null) { return false; }
         if (node == this) { return true; }
         else { return this.contains(node.parentNode); }
       };
     }
   }
 }

 function dropdownTrigger(tree, li, navid, isie, horiz)
 {
   var opentime, closetime;
   var a = li.getElementsByTagName('a')[0];
   var menu = li.getElementsByTagName('ul').length > 0
       ? li.getElementsByTagName('ul')[0] : null;
   var issub = li.parentNode.id == navid;

   if (menu)
   {
     li.className += (li.className == '' ? '' : ' ') + 'hasmenu';
   }

   attachEventListener(a, 'focus', function(e)
   {
     clearTimeout(closetime);

     a.className += (a.className == '' ? '' : ' ') + 'rollover';

     resetSiblingBranches(li);
     if (menu)
     {
       showMenu(menu, horiz, issub, li, a, isie);
     }

     var parent = li.parentNode;
     if (parent != tree)
     {
       if (parent.style.left == '' || parent.style.left == '-100em')
       {
         showAncestors(tree, parent, horiz, issub, isie);
       }

       if (toggleSelects('visible') && tree.contains(e.srcElement))
       {
         toggleSelects('hidden');
       }
     }
   }, false);

   attachEventListener(li, 'mouseover', function(e)
   {
     if (unwantedTextEvent()) { return; }
     clearTimeout(closetime);
     if (branch == li) { branch = null; }

     a.className += (a.className == '' ? '' : ' ') + 'rollover';

     var target = typeof e.target != 'undefined' ? e.target : window.event.srcElement;
     while (target.nodeName.toUpperCase() != 'LI')
     {
       target = target.parentNode;
     }
     if (target != li) { return; }

     if (menu)
     {
       opentime = window.setTimeout(function()
       {
         if (branch)
         {
           clearMenus(branch);
           branch = null;
         }

         resetSiblingBranches(li);
         showMenu(menu, horiz, issub, li, a, isie);
       }, 250);
     }
   }, false);

   attachEventListener(li, 'mouseout', function(e)
   {
     if (unwantedTextEvent()) { return; }

     var related = typeof e.relatedTarget != 'undefined' ? e.relatedTarget : window.event.toElement;
     if (!li.contains(related))
     {
       clearTimeout(opentime);
       branch = li;

       a.className = a.className.replace(/ ?rollover/g, '');
       if (menu)
       {
         closetime = window.setTimeout(function()
         {
           menu.style.left = '-100em';

           if (toggleSelects('visible') && tree.contains(related))
           {
             toggleSelects('hidden');
           }
           else
           {
             removeIframeLayer(menu);
           }

         }, 600);
       }
     }
   }, false);

   if (!isie)
   {
     li.contains = function(node)
     {
       if (node == null) { return false; }
       if (node == this) { return true; }
       else { return this.contains(node.parentNode); }
     };
   }
 }

 function showMenu(menu, horiz, issub, li, a, isie)
 {
   menu.style.left = horiz
       ? (isie ? li.offsetLeft + 'px' : 'auto')
       : '0';

   menu.style.top = horiz && issub
       ? (isie ? a.offsetHeight + 'px' : 'auto')
       : (isie ? li.offsetTop + 'px' : '0');

   repositionMenu(menu);

   if (typeof document.uniqueID != 'undefined')
   {
     createIframeLayer(menu);
   }
 }

 function showAncestors(tree, menu, horiz, issub, isie)
 {
   clearMenus(tree);

   while (menu.id != tree.id)
   {
     var li = menu.parentNode;
     var a = li.getElementsByTagName('a')[0];

     showMenu(menu, horiz, issub, li, a, isie);

     menu = li.parentNode;
   }
 }

 function resetSiblingBranches(trigger)
 {
   clearMenus(trigger.parentNode);

   var links = trigger.parentNode.getElementsByTagName('a');
   for (var i = 0; i < links.length; i++)
   {
     links[i].className = links[i].className.replace(/ ?rollover/g, '');
   }
 }

 function cleanUselessWhitespace(node)
 {
   for (var x = 0; x < node.childNodes.length; x++)
   {
     var child = node.childNodes[x];
     if (child.nodeType == 3 && !/\S/.test(child.nodeValue))
     {
       node.removeChild(node.childNodes[x]);
       x--;
     }
     if (child.nodeType == 1)
     {
       cleanUselessWhitespace(child);
     }
   }
 }

 function mapKeyCode(keycode, type)
 {
   switch (type)
   {
     case 0:
       if (keycode == 37) keycode = 39;
       else if (keycode == 39) keycode = 37;
       break;

     case 1:
       if (keycode % 2) keycode++;
       else keycode--;
       break;

     case 2:
       if (keycode == 38) { keycode = 37; }
       break;
   }

   return keycode;
 }

 function arrowKeyNavigation(tree, link, keycode, horiz)
 {
   var li = link.parentNode;
   var menu = li.getElementsByTagName('ul').length > 0
       ? li.getElementsByTagName('ul')[0] : null;
   var parent = li.parentNode;

   if (menu)
   {
     if (getRoughPosition(menu, 'x')
         < getRoughPosition(li.parentNode, 'x'))
     {
       keycode = mapKeyCode(keycode, 0);
     }
   }
   else if (parent != tree)
   {
     if (getRoughPosition(parent.parentNode.parentNode, 'x')
         > getRoughPosition(parent, 'x'))
     {
       keycode = mapKeyCode(keycode, 0);
     }
   }

   if (horiz)
   {
     if (parent == tree)
     {
       keycode = mapKeyCode(keycode, 1);
     }
     else if (parent.parentNode.parentNode == tree
         && li == li.parentNode.firstChild)
     {
       keycode = mapKeyCode(keycode, 2);
     }
   }

   switch (keycode)
   {
     case 37:
       parent = parent.parentNode;
       if (tree.parentNode == parent) { parent = null; }
       if (parent)
       {
         parent.firstChild.focus();
       }
       break;

     case 38:
       var previous = li.previousSibling;
       if (!previous)
       {
         previous = li.parentNode.childNodes
             [li.parentNode.childNodes.length - 1];
       }
       previous.firstChild.focus();
       break;

     case 39:
       if (menu)
       {
         menu.firstChild.firstChild.focus();
       }
       break;

     case 40:
       var next = li.nextSibling;
       if (!next)
       {
         next = li.parentNode.childNodes[0];
       }
       next.firstChild.focus();
       break;
   }
 }

 function clearMenus(root)
 {
   var menus = root.getElementsByTagName('ul');
   for (var i = 0; i < menus.length; i++)
   {
     menus[i].style.left = '-100em';
     removeIframeLayer(menus[i]);
   }
 }

 function unwantedTextEvent()
 {
   return (navigator.vendor == 'Apple Computer, Inc.'
       && (event.target == event.relatedTarget.parentNode
       || (event.eventPhase == 3
       && event.target.parentNode == event.relatedTarget)));
 }

 function getRoughPosition(ele, dir)
 {
   var pos = dir == 'x' ? ele.offsetLeft : ele.offsetTop;
   var tmp = ele.offsetParent;
   while (tmp != null)
   {
     pos += dir == 'x' ? tmp.offsetLeft : tmp.offsetTop;
     tmp = tmp.offsetParent;
   }
   return pos;
 }

 function getViewportSize()
 {
   var size = [0,0];

   if (typeof window.innerWidth != 'undefined')
   {
     size = [
         window.innerWidth,
         window.innerHeight
     ];
   }
   else if (typeof document.documentElement != 'undefined'
       && typeof document.documentElement.clientWidth != 'undefined'
       && document.documentElement.clientWidth != 0)
   {
     size = [
         document.documentElement.clientWidth,
         document.documentElement.clientHeight
     ];
   }
   else
   {
     size = [
         document.getElementsByTagName('body')[0].clientWidth,
         document.getElementsByTagName('body')[0].clientHeight
     ];
   }

   return size;
 }

 function repositionMenu(menu)
 {
   var extent = [
       getRoughPosition(menu, 'x') + menu.offsetWidth + 25,
       getRoughPosition(menu, 'y') + menu.offsetHeight + 25
   ];
   var viewsize = getViewportSize();

   if (extent[0] > viewsize[0])
   {
     var offset = menu.offsetWidth
         + menu.parentNode.parentNode.offsetWidth;
     var inset = menu.parentNode.offsetWidth
         - menu.offsetLeft;

     menu.style.left = (0 - offset + (inset * 2)) + 'px';
   }

   if (extent[1] > viewsize[1])
   {
     var current = parseInt(menu.style.top, 10);
     var difference = extent[1] - viewsize[1];

     menu.style.top = (current - difference) + 'px';
   }
 }

 function createIframeLayer(menu)
 {
   if (!toggleSelects('hidden'))
   {
     var layer = document.createElement('iframe');
     layer.tabIndex = '-1';
     layer.src = 'javascript:false;';
     menu.parentNode.appendChild(layer);

     layer.style.left = menu.offsetLeft + 'px';
     layer.style.top = menu.offsetTop + 'px';
     layer.style.width = menu.offsetWidth + 'px';
     layer.style.height = menu.offsetHeight + 'px';
   }
 }

 function removeIframeLayer(menu)
 {
   if (!toggleSelects('visible'))
   {
     var layers = menu.parentNode.getElementsByTagName('iframe');
     while (layers.length > 0)
     {
       layers[0].parentNode.removeChild(layers[0]);
     }
   }
 }

 function toggleSelects(vis)
 {
   if (typeof document.uniqueID != 'undefined'
       && typeof document.body.style.scrollbarTrackColor == 'undefined')
   {
     var selects = document.getElementsByTagName('select');
     for (var i = 0; i < selects.length; i++)
     {
       selects[i].style.visibility = vis;
     }

     return true;
   }

   return false;
 }

 function attachEventListener(target, eventType, functionRef, capture)
 {
   if (typeof target.addEventListener != 'undefined')
   {
     target.addEventListener(eventType, functionRef, capture);
   }
   else if (typeof target.attachEvent != 'undefined')
   {
     target.attachEvent('on' + eventType, functionRef);
   }
   else
   {
     eventType = 'on' + eventType;

     if (typeof target[eventType] == 'function')
     {
       var oldListener = target[eventType];

       target[eventType] = function()
       {
         oldListener();

         return functionRef();
       }
     }
     else
     {
       target[eventType] = functionRef;
     }
   }

   return true;
 }

 function addLoadListener(fn)
 {
   if (typeof window.addEventListener != 'undefined')
   {
     window.addEventListener('load', fn, false);
   }
   else if (typeof document.addEventListener != 'undefined')
   {
     document.addEventListener('load', fn, false);
   }
   else if (typeof window.attachEvent != 'undefined')
   {
     window.attachEvent('onload', fn);
   }
   else
   {
     var oldfn = window.onload;
     if (typeof window.onload != 'function')
     {
       window.onload = fn;
     }
     else
     {
       window.onload = function()
       {
         oldfn();
         fn();
       };
     }
   }
 }

 addLoadListener(function() { dropdownMenu('navigation'); });

 // (function () {
 //
 //
 //     var toggleState = function (elem, state) {
 //         var elem = document.querySelector(elem);
 //         elem.setAttribute('aria-'+state,
 //           elem.getAttribute('aria-'+state) === "true" ? "false" : "true");
 //     };
 //
 //     document.querySelector('.nav-toggle').onClick = function (e) {
 //         toggleState('ul.horizontal', 'expanded');
 //         e.preventDefault();
 //     };
 //
 // })();

/*!
 * jQuery Form Plugin
 * version: 3.51.0-2014.06.20
 * Requires jQuery v1.5 or later
 * Copyright (c) 2014 M. Alsup
 * Examples and documentation at: http://malsup.com/jquery/form/
 * Project repository: https://github.com/malsup/form
 * Dual licensed under the MIT and GPL licenses.
 * https://github.com/malsup/form#copyright-and-license
 */
!function(e){"use strict";"function"==typeof define&&define.amd?define(["jquery"],e):e("undefined"!=typeof jQuery?jQuery:window.Zepto)}(function(e){"use strict";function t(t){var r=t.data;t.isDefaultPrevented()||(t.preventDefault(),e(t.target).ajaxSubmit(r))}function r(t){var r=t.target,a=e(r);if(!a.is("[type=submit],[type=image]")){var n=a.closest("[type=submit]");if(0===n.length)return;r=n[0]}var i=this;if(i.clk=r,"image"==r.type)if(void 0!==t.offsetX)i.clk_x=t.offsetX,i.clk_y=t.offsetY;else if("function"==typeof e.fn.offset){var o=a.offset();i.clk_x=t.pageX-o.left,i.clk_y=t.pageY-o.top}else i.clk_x=t.pageX-r.offsetLeft,i.clk_y=t.pageY-r.offsetTop;setTimeout(function(){i.clk=i.clk_x=i.clk_y=null},100)}function a(){if(e.fn.ajaxSubmit.debug){var t="[jquery.form] "+Array.prototype.join.call(arguments,"");window.console&&window.console.log?window.console.log(t):window.opera&&window.opera.postError&&window.opera.postError(t)}}var n={};n.fileapi=void 0!==e("<input type='file'/>").get(0).files,n.formdata=void 0!==window.FormData;var i=!!e.fn.prop;e.fn.attr2=function(){if(!i)return this.attr.apply(this,arguments);var e=this.prop.apply(this,arguments);return e&&e.jquery||"string"==typeof e?e:this.attr.apply(this,arguments)},e.fn.ajaxSubmit=function(t){function r(r){var a,n,i=e.param(r,t.traditional).split("&"),o=i.length,s=[];for(a=0;o>a;a++)i[a]=i[a].replace(/\+/g," "),n=i[a].split("="),s.push([decodeURIComponent(n[0]),decodeURIComponent(n[1])]);return s}function o(a){for(var n=new FormData,i=0;i<a.length;i++)n.append(a[i].name,a[i].value);if(t.extraData){var o=r(t.extraData);for(i=0;i<o.length;i++)o[i]&&n.append(o[i][0],o[i][1])}t.data=null;var s=e.extend(!0,{},e.ajaxSettings,t,{contentType:!1,processData:!1,cache:!1,type:u||"POST"});t.uploadProgress&&(s.xhr=function(){var r=e.ajaxSettings.xhr();return r.upload&&r.upload.addEventListener("progress",function(e){var r=0,a=e.loaded||e.position,n=e.total;e.lengthComputable&&(r=Math.ceil(a/n*100)),t.uploadProgress(e,a,n,r)},!1),r}),s.data=null;var c=s.beforeSend;return s.beforeSend=function(e,r){r.data=t.formData?t.formData:n,c&&c.call(this,e,r)},e.ajax(s)}function s(r){function n(e){var t=null;try{e.contentWindow&&(t=e.contentWindow.document)}catch(r){a("cannot get iframe.contentWindow document: "+r)}if(t)return t;try{t=e.contentDocument?e.contentDocument:e.document}catch(r){a("cannot get iframe.contentDocument: "+r),t=e.document}return t}function o(){function t(){try{var e=n(g).readyState;a("state = "+e),e&&"uninitialized"==e.toLowerCase()&&setTimeout(t,50)}catch(r){a("Server abort: ",r," (",r.name,")"),s(k),j&&clearTimeout(j),j=void 0}}var r=f.attr2("target"),i=f.attr2("action"),o="multipart/form-data",c=f.attr("enctype")||f.attr("encoding")||o;w.setAttribute("target",p),(!u||/post/i.test(u))&&w.setAttribute("method","POST"),i!=m.url&&w.setAttribute("action",m.url),m.skipEncodingOverride||u&&!/post/i.test(u)||f.attr({encoding:"multipart/form-data",enctype:"multipart/form-data"}),m.timeout&&(j=setTimeout(function(){T=!0,s(D)},m.timeout));var l=[];try{if(m.extraData)for(var d in m.extraData)m.extraData.hasOwnProperty(d)&&l.push(e.isPlainObject(m.extraData[d])&&m.extraData[d].hasOwnProperty("name")&&m.extraData[d].hasOwnProperty("value")?e('<input type="hidden" name="'+m.extraData[d].name+'">').val(m.extraData[d].value).appendTo(w)[0]:e('<input type="hidden" name="'+d+'">').val(m.extraData[d]).appendTo(w)[0]);m.iframeTarget||v.appendTo("body"),g.attachEvent?g.attachEvent("onload",s):g.addEventListener("load",s,!1),setTimeout(t,15);try{w.submit()}catch(h){var x=document.createElement("form").submit;x.apply(w)}}finally{w.setAttribute("action",i),w.setAttribute("enctype",c),r?w.setAttribute("target",r):f.removeAttr("target"),e(l).remove()}}function s(t){if(!x.aborted&&!F){if(M=n(g),M||(a("cannot access response document"),t=k),t===D&&x)return x.abort("timeout"),void S.reject(x,"timeout");if(t==k&&x)return x.abort("server abort"),void S.reject(x,"error","server abort");if(M&&M.location.href!=m.iframeSrc||T){g.detachEvent?g.detachEvent("onload",s):g.removeEventListener("load",s,!1);var r,i="success";try{if(T)throw"timeout";var o="xml"==m.dataType||M.XMLDocument||e.isXMLDoc(M);if(a("isXml="+o),!o&&window.opera&&(null===M.body||!M.body.innerHTML)&&--O)return a("requeing onLoad callback, DOM not available"),void setTimeout(s,250);var u=M.body?M.body:M.documentElement;x.responseText=u?u.innerHTML:null,x.responseXML=M.XMLDocument?M.XMLDocument:M,o&&(m.dataType="xml"),x.getResponseHeader=function(e){var t={"content-type":m.dataType};return t[e.toLowerCase()]},u&&(x.status=Number(u.getAttribute("status"))||x.status,x.statusText=u.getAttribute("statusText")||x.statusText);var c=(m.dataType||"").toLowerCase(),l=/(json|script|text)/.test(c);if(l||m.textarea){var f=M.getElementsByTagName("textarea")[0];if(f)x.responseText=f.value,x.status=Number(f.getAttribute("status"))||x.status,x.statusText=f.getAttribute("statusText")||x.statusText;else if(l){var p=M.getElementsByTagName("pre")[0],h=M.getElementsByTagName("body")[0];p?x.responseText=p.textContent?p.textContent:p.innerText:h&&(x.responseText=h.textContent?h.textContent:h.innerText)}}else"xml"==c&&!x.responseXML&&x.responseText&&(x.responseXML=X(x.responseText));try{E=_(x,c,m)}catch(y){i="parsererror",x.error=r=y||i}}catch(y){a("error caught: ",y),i="error",x.error=r=y||i}x.aborted&&(a("upload aborted"),i=null),x.status&&(i=x.status>=200&&x.status<300||304===x.status?"success":"error"),"success"===i?(m.success&&m.success.call(m.context,E,"success",x),S.resolve(x.responseText,"success",x),d&&e.event.trigger("ajaxSuccess",[x,m])):i&&(void 0===r&&(r=x.statusText),m.error&&m.error.call(m.context,x,i,r),S.reject(x,"error",r),d&&e.event.trigger("ajaxError",[x,m,r])),d&&e.event.trigger("ajaxComplete",[x,m]),d&&!--e.active&&e.event.trigger("ajaxStop"),m.complete&&m.complete.call(m.context,x,i),F=!0,m.timeout&&clearTimeout(j),setTimeout(function(){m.iframeTarget?v.attr("src",m.iframeSrc):v.remove(),x.responseXML=null},100)}}}var c,l,m,d,p,v,g,x,y,b,T,j,w=f[0],S=e.Deferred();if(S.abort=function(e){x.abort(e)},r)for(l=0;l<h.length;l++)c=e(h[l]),i?c.prop("disabled",!1):c.removeAttr("disabled");if(m=e.extend(!0,{},e.ajaxSettings,t),m.context=m.context||m,p="jqFormIO"+(new Date).getTime(),m.iframeTarget?(v=e(m.iframeTarget),b=v.attr2("name"),b?p=b:v.attr2("name",p)):(v=e('<iframe name="'+p+'" src="'+m.iframeSrc+'" />'),v.css({position:"absolute",top:"-1000px",left:"-1000px"})),g=v[0],x={aborted:0,responseText:null,responseXML:null,status:0,statusText:"n/a",getAllResponseHeaders:function(){},getResponseHeader:function(){},setRequestHeader:function(){},abort:function(t){var r="timeout"===t?"timeout":"aborted";a("aborting upload... "+r),this.aborted=1;try{g.contentWindow.document.execCommand&&g.contentWindow.document.execCommand("Stop")}catch(n){}v.attr("src",m.iframeSrc),x.error=r,m.error&&m.error.call(m.context,x,r,t),d&&e.event.trigger("ajaxError",[x,m,r]),m.complete&&m.complete.call(m.context,x,r)}},d=m.global,d&&0===e.active++&&e.event.trigger("ajaxStart"),d&&e.event.trigger("ajaxSend",[x,m]),m.beforeSend&&m.beforeSend.call(m.context,x,m)===!1)return m.global&&e.active--,S.reject(),S;if(x.aborted)return S.reject(),S;y=w.clk,y&&(b=y.name,b&&!y.disabled&&(m.extraData=m.extraData||{},m.extraData[b]=y.value,"image"==y.type&&(m.extraData[b+".x"]=w.clk_x,m.extraData[b+".y"]=w.clk_y)));var D=1,k=2,A=e("meta[name=csrf-token]").attr("content"),L=e("meta[name=csrf-param]").attr("content");L&&A&&(m.extraData=m.extraData||{},m.extraData[L]=A),m.forceSync?o():setTimeout(o,10);var E,M,F,O=50,X=e.parseXML||function(e,t){return window.ActiveXObject?(t=new ActiveXObject("Microsoft.XMLDOM"),t.async="false",t.loadXML(e)):t=(new DOMParser).parseFromString(e,"text/xml"),t&&t.documentElement&&"parsererror"!=t.documentElement.nodeName?t:null},C=e.parseJSON||function(e){return window.eval("("+e+")")},_=function(t,r,a){var n=t.getResponseHeader("content-type")||"",i="xml"===r||!r&&n.indexOf("xml")>=0,o=i?t.responseXML:t.responseText;return i&&"parsererror"===o.documentElement.nodeName&&e.error&&e.error("parsererror"),a&&a.dataFilter&&(o=a.dataFilter(o,r)),"string"==typeof o&&("json"===r||!r&&n.indexOf("json")>=0?o=C(o):("script"===r||!r&&n.indexOf("javascript")>=0)&&e.globalEval(o)),o};return S}if(!this.length)return a("ajaxSubmit: skipping submit process - no element selected"),this;var u,c,l,f=this;"function"==typeof t?t={success:t}:void 0===t&&(t={}),u=t.type||this.attr2("method"),c=t.url||this.attr2("action"),l="string"==typeof c?e.trim(c):"",l=l||window.location.href||"",l&&(l=(l.match(/^([^#]+)/)||[])[1]),t=e.extend(!0,{url:l,success:e.ajaxSettings.success,type:u||e.ajaxSettings.type,iframeSrc:/^https/i.test(window.location.href||"")?"javascript:false":"about:blank"},t);var m={};if(this.trigger("form-pre-serialize",[this,t,m]),m.veto)return a("ajaxSubmit: submit vetoed via form-pre-serialize trigger"),this;if(t.beforeSerialize&&t.beforeSerialize(this,t)===!1)return a("ajaxSubmit: submit aborted via beforeSerialize callback"),this;var d=t.traditional;void 0===d&&(d=e.ajaxSettings.traditional);var p,h=[],v=this.formToArray(t.semantic,h);if(t.data&&(t.extraData=t.data,p=e.param(t.data,d)),t.beforeSubmit&&t.beforeSubmit(v,this,t)===!1)return a("ajaxSubmit: submit aborted via beforeSubmit callback"),this;if(this.trigger("form-submit-validate",[v,this,t,m]),m.veto)return a("ajaxSubmit: submit vetoed via form-submit-validate trigger"),this;var g=e.param(v,d);p&&(g=g?g+"&"+p:p),"GET"==t.type.toUpperCase()?(t.url+=(t.url.indexOf("?")>=0?"&":"?")+g,t.data=null):t.data=g;var x=[];if(t.resetForm&&x.push(function(){f.resetForm()}),t.clearForm&&x.push(function(){f.clearForm(t.includeHidden)}),!t.dataType&&t.target){var y=t.success||function(){};x.push(function(r){var a=t.replaceTarget?"replaceWith":"html";e(t.target)[a](r).each(y,arguments)})}else t.success&&x.push(t.success);if(t.success=function(e,r,a){for(var n=t.context||this,i=0,o=x.length;o>i;i++)x[i].apply(n,[e,r,a||f,f])},t.error){var b=t.error;t.error=function(e,r,a){var n=t.context||this;b.apply(n,[e,r,a,f])}}if(t.complete){var T=t.complete;t.complete=function(e,r){var a=t.context||this;T.apply(a,[e,r,f])}}var j=e("input[type=file]:enabled",this).filter(function(){return""!==e(this).val()}),w=j.length>0,S="multipart/form-data",D=f.attr("enctype")==S||f.attr("encoding")==S,k=n.fileapi&&n.formdata;a("fileAPI :"+k);var A,L=(w||D)&&!k;t.iframe!==!1&&(t.iframe||L)?t.closeKeepAlive?e.get(t.closeKeepAlive,function(){A=s(v)}):A=s(v):A=(w||D)&&k?o(v):e.ajax(t),f.removeData("jqxhr").data("jqxhr",A);for(var E=0;E<h.length;E++)h[E]=null;return this.trigger("form-submit-notify",[this,t]),this},e.fn.ajaxForm=function(n){if(n=n||{},n.delegation=n.delegation&&e.isFunction(e.fn.on),!n.delegation&&0===this.length){var i={s:this.selector,c:this.context};return!e.isReady&&i.s?(a("DOM not ready, queuing ajaxForm"),e(function(){e(i.s,i.c).ajaxForm(n)}),this):(a("terminating; zero elements found by selector"+(e.isReady?"":" (DOM not ready)")),this)}return n.delegation?(e(document).off("submit.form-plugin",this.selector,t).off("click.form-plugin",this.selector,r).on("submit.form-plugin",this.selector,n,t).on("click.form-plugin",this.selector,n,r),this):this.ajaxFormUnbind().bind("submit.form-plugin",n,t).bind("click.form-plugin",n,r)},e.fn.ajaxFormUnbind=function(){return this.unbind("submit.form-plugin click.form-plugin")},e.fn.formToArray=function(t,r){var a=[];if(0===this.length)return a;var i,o=this[0],s=this.attr("id"),u=t?o.getElementsByTagName("*"):o.elements;if(u&&!/MSIE [678]/.test(navigator.userAgent)&&(u=e(u).get()),s&&(i=e(':input[form="'+s+'"]').get(),i.length&&(u=(u||[]).concat(i))),!u||!u.length)return a;var c,l,f,m,d,p,h;for(c=0,p=u.length;p>c;c++)if(d=u[c],f=d.name,f&&!d.disabled)if(t&&o.clk&&"image"==d.type)o.clk==d&&(a.push({name:f,value:e(d).val(),type:d.type}),a.push({name:f+".x",value:o.clk_x},{name:f+".y",value:o.clk_y}));else if(m=e.fieldValue(d,!0),m&&m.constructor==Array)for(r&&r.push(d),l=0,h=m.length;h>l;l++)a.push({name:f,value:m[l]});else if(n.fileapi&&"file"==d.type){r&&r.push(d);var v=d.files;if(v.length)for(l=0;l<v.length;l++)a.push({name:f,value:v[l],type:d.type});else a.push({name:f,value:"",type:d.type})}else null!==m&&"undefined"!=typeof m&&(r&&r.push(d),a.push({name:f,value:m,type:d.type,required:d.required}));if(!t&&o.clk){var g=e(o.clk),x=g[0];f=x.name,f&&!x.disabled&&"image"==x.type&&(a.push({name:f,value:g.val()}),a.push({name:f+".x",value:o.clk_x},{name:f+".y",value:o.clk_y}))}return a},e.fn.formSerialize=function(t){return e.param(this.formToArray(t))},e.fn.fieldSerialize=function(t){var r=[];return this.each(function(){var a=this.name;if(a){var n=e.fieldValue(this,t);if(n&&n.constructor==Array)for(var i=0,o=n.length;o>i;i++)r.push({name:a,value:n[i]});else null!==n&&"undefined"!=typeof n&&r.push({name:this.name,value:n})}}),e.param(r)},e.fn.fieldValue=function(t){for(var r=[],a=0,n=this.length;n>a;a++){var i=this[a],o=e.fieldValue(i,t);null===o||"undefined"==typeof o||o.constructor==Array&&!o.length||(o.constructor==Array?e.merge(r,o):r.push(o))}return r},e.fieldValue=function(t,r){var a=t.name,n=t.type,i=t.tagName.toLowerCase();if(void 0===r&&(r=!0),r&&(!a||t.disabled||"reset"==n||"button"==n||("checkbox"==n||"radio"==n)&&!t.checked||("submit"==n||"image"==n)&&t.form&&t.form.clk!=t||"select"==i&&-1==t.selectedIndex))return null;if("select"==i){var o=t.selectedIndex;if(0>o)return null;for(var s=[],u=t.options,c="select-one"==n,l=c?o+1:u.length,f=c?o:0;l>f;f++){var m=u[f];if(m.selected){var d=m.value;if(d||(d=m.attributes&&m.attributes.value&&!m.attributes.value.specified?m.text:m.value),c)return d;s.push(d)}}return s}return e(t).val()},e.fn.clearForm=function(t){return this.each(function(){e("input,select,textarea",this).clearFields(t)})},e.fn.clearFields=e.fn.clearInputs=function(t){var r=/^(?:color|date|datetime|email|month|number|password|range|search|tel|text|time|url|week)$/i;return this.each(function(){var a=this.type,n=this.tagName.toLowerCase();r.test(a)||"textarea"==n?this.value="":"checkbox"==a||"radio"==a?this.checked=!1:"select"==n?this.selectedIndex=-1:"file"==a?/MSIE/.test(navigator.userAgent)?e(this).replaceWith(e(this).clone(!0)):e(this).val(""):t&&(t===!0&&/hidden/.test(a)||"string"==typeof t&&e(this).is(t))&&(this.value="")})},e.fn.resetForm=function(){return this.each(function(){("function"==typeof this.reset||"object"==typeof this.reset&&!this.reset.nodeType)&&this.reset()})},e.fn.enable=function(e){return void 0===e&&(e=!0),this.each(function(){this.disabled=!e})},e.fn.selected=function(t){return void 0===t&&(t=!0),this.each(function(){var r=this.type;if("checkbox"==r||"radio"==r)this.checked=t;else if("option"==this.tagName.toLowerCase()){var a=e(this).parent("select");t&&a[0]&&"select-one"==a[0].type&&a.find("option").selected(!1),this.selected=t}})},e.fn.ajaxSubmit.debug=!1});

/* contact-form-7/includes/js/jquery.form.min.js?ver=3.51.0-2014.06.20 */
(function($) {

	if (typeof _wpcf7 == 'undefined' || _wpcf7 === null) {
		_wpcf7 = {};
	}

	_wpcf7 = $.extend({
		cached: 0
	}, _wpcf7);

	$.fn.wpcf7InitForm = function() {
		this.ajaxForm({
			beforeSubmit: function(arr, $form, options) {
				$form.wpcf7ClearResponseOutput();
				$form.find('[aria-invalid]').attr('aria-invalid', 'false');
				$form.find('img.ajax-loader').css({ visibility: 'visible' });
				return true;
			},
			beforeSerialize: function($form, options) {
				$form.find('[placeholder].placeheld').each(function(i, n) {
					$(n).val('');
				});
				return true;
			},
			data: { '_wpcf7_is_ajax_call': 1 },
			dataType: 'json',
			success: $.wpcf7AjaxSuccess,
			error: function(xhr, status, error, $form) {
				var e = $('<div class="ajax-error"></div>').text(error.message);
				$form.after(e);
			}
		});

		if (_wpcf7.cached) {
			this.wpcf7OnloadRefill();
		}

		this.wpcf7ToggleSubmit();

		this.find('.wpcf7-submit').wpcf7AjaxLoader();

		this.find('.wpcf7-acceptance').click(function() {
			$(this).closest('form').wpcf7ToggleSubmit();
		});

		this.find('.wpcf7-exclusive-checkbox').wpcf7ExclusiveCheckbox();

		this.find('.wpcf7-list-item.has-free-text').wpcf7ToggleCheckboxFreetext();

		this.find('[placeholder]').wpcf7Placeholder();

		if (_wpcf7.jqueryUi && ! _wpcf7.supportHtml5.date) {
			this.find('input.wpcf7-date[type="date"]').each(function() {
				$(this).datepicker({
					dateFormat: 'yy-mm-dd',
					minDate: new Date($(this).attr('min')),
					maxDate: new Date($(this).attr('max'))
				});
			});
		}

		if (_wpcf7.jqueryUi && ! _wpcf7.supportHtml5.number) {
			this.find('input.wpcf7-number[type="number"]').each(function() {
				$(this).spinner({
					min: $(this).attr('min'),
					max: $(this).attr('max'),
					step: $(this).attr('step')
				});
			});
		}

		this.find('.wpcf7-character-count').wpcf7CharacterCount();

		this.find('.wpcf7-validates-as-url').change(function() {
			$(this).wpcf7NormalizeUrl();
		});
	};

	$.wpcf7AjaxSuccess = function(data, status, xhr, $form) {
		if (! $.isPlainObject(data) || $.isEmptyObject(data)) {
			return;
		}

		var $responseOutput = $form.find('div.wpcf7-response-output');

		$form.wpcf7ClearResponseOutput();

		$form.find('.wpcf7-form-control').removeClass('wpcf7-not-valid');
		$form.removeClass('invalid spam sent failed');

		if (data.captcha) {
			$form.wpcf7RefillCaptcha(data.captcha);
		}

		if (data.quiz) {
			$form.wpcf7RefillQuiz(data.quiz);
		}

		if (data.invalids) {
			$.each(data.invalids, function(i, n) {
				$form.find(n.into).wpcf7NotValidTip(n.message);
				$form.find(n.into).find('.wpcf7-form-control').addClass('wpcf7-not-valid');
				$form.find(n.into).find('[aria-invalid]').attr('aria-invalid', 'true');
			});

			$responseOutput.addClass('wpcf7-validation-errors');
			$form.addClass('invalid');

			$(data.into).trigger('wpcf7:invalid');
			$(data.into).trigger('invalid.wpcf7'); // deprecated

		} else if (1 == data.spam) {
			$responseOutput.addClass('wpcf7-spam-blocked');
			$form.addClass('spam');

			$(data.into).trigger('wpcf7:spam');
			$(data.into).trigger('spam.wpcf7'); // deprecated

		} else if (1 == data.mailSent) {
			$responseOutput.addClass('wpcf7-mail-sent-ok');
			$form.addClass('sent');

			if (data.onSentOk) {
				$.each(data.onSentOk, function(i, n) { eval(n) });
			}

			$(data.into).trigger('wpcf7:mailsent');
			$(data.into).trigger('mailsent.wpcf7'); // deprecated

		} else {
			$responseOutput.addClass('wpcf7-mail-sent-ng');
			$form.addClass('failed');

			$(data.into).trigger('wpcf7:mailfailed');
			$(data.into).trigger('mailfailed.wpcf7'); // deprecated
		}

		if (data.onSubmit) {
			$.each(data.onSubmit, function(i, n) { eval(n) });
		}

		$(data.into).trigger('wpcf7:submit');
		$(data.into).trigger('submit.wpcf7'); // deprecated

		if (1 == data.mailSent) {
			$form.resetForm();
		}

		$form.find('[placeholder].placeheld').each(function(i, n) {
			$(n).val($(n).attr('placeholder'));
		});

		$responseOutput.append(data.message).slideDown('fast');
		$responseOutput.attr('role', 'alert');

		$.wpcf7UpdateScreenReaderResponse($form, data);
	};

	$.fn.wpcf7ExclusiveCheckbox = function() {
		return this.find('input:checkbox').click(function() {
			var name = $(this).attr('name');
			$(this).closest('form').find('input:checkbox[name="' + name + '"]').not(this).prop('checked', false);
		});
	};

	$.fn.wpcf7Placeholder = function() {
		if (_wpcf7.supportHtml5.placeholder) {
			return this;
		}

		return this.each(function() {
			$(this).val($(this).attr('placeholder'));
			$(this).addClass('placeheld');

			$(this).focus(function() {
				if ($(this).hasClass('placeheld'))
					$(this).val('').removeClass('placeheld');
			});

			$(this).blur(function() {
				if ('' == $(this).val()) {
					$(this).val($(this).attr('placeholder'));
					$(this).addClass('placeheld');
				}
			});
		});
	};

	$.fn.wpcf7AjaxLoader = function() {
		return this.each(function() {
			var loader = $('<img class="ajax-loader" />')
				.attr({ src: _wpcf7.loaderUrl, alt: _wpcf7.sending })
				.css('visibility', 'hidden');

			$(this).after(loader);
		});
	};

	$.fn.wpcf7ToggleSubmit = function() {
		return this.each(function() {
			var form = $(this);

			if (this.tagName.toLowerCase() != 'form') {
				form = $(this).find('form').first();
			}

			if (form.hasClass('wpcf7-acceptance-as-validation')) {
				return;
			}

			var submit = form.find('input:submit');
			if (! submit.length) return;

			var acceptances = form.find('input:checkbox.wpcf7-acceptance');
			if (! acceptances.length) return;

			submit.removeAttr('disabled');
			acceptances.each(function(i, n) {
				n = $(n);
				if (n.hasClass('wpcf7-invert') && n.is(':checked')
				|| ! n.hasClass('wpcf7-invert') && ! n.is(':checked')) {
					submit.attr('disabled', 'disabled');
				}
			});
		});
	};

	$.fn.wpcf7ToggleCheckboxFreetext = function() {
		return this.each(function() {
			var $wrap = $(this).closest('.wpcf7-form-control');

			if ($(this).find(':checkbox, :radio').is(':checked')) {
				$(this).find(':input.wpcf7-free-text').prop('disabled', false);
			} else {
				$(this).find(':input.wpcf7-free-text').prop('disabled', true);
			}

			$wrap.find(':checkbox, :radio').change(function() {
				var $cb = $('.has-free-text', $wrap).find(':checkbox, :radio');
				var $freetext = $(':input.wpcf7-free-text', $wrap);

				if ($cb.is(':checked')) {
					$freetext.prop('disabled', false).focus();
				} else {
					$freetext.prop('disabled', true);
				}
			});
		});
	};

	$.fn.wpcf7CharacterCount = function() {
		return this.each(function() {
			var $count = $(this);
			var name = $count.attr('data-target-name');
			var down = $count.hasClass('down');
			var starting = parseInt($count.attr('data-starting-value'), 10);
			var maximum = parseInt($count.attr('data-maximum-value'), 10);
			var minimum = parseInt($count.attr('data-minimum-value'), 10);

			var updateCount = function($target) {
				var length = $target.val().length;
				var count = down ? starting - length : length;
				$count.attr('data-current-value', count);
				$count.text(count);

				if (maximum && maximum < length) {
					$count.addClass('too-long');
				} else {
					$count.removeClass('too-long');
				}

				if (minimum && length < minimum) {
					$count.addClass('too-short');
				} else {
					$count.removeClass('too-short');
				}
			};

			$count.closest('form').find(':input[name="' + name + '"]').each(function() {
				updateCount($(this));

				$(this).keyup(function() {
					updateCount($(this));
				});
			});
		});
	};

	$.fn.wpcf7NormalizeUrl = function() {
		return this.each(function() {
			var val = $.trim($(this).val());

			if (val && ! val.match(/^[a-z][a-z0-9.+-]*:/i)) { // check the scheme part
				val = val.replace(/^\/+/, '');
				val = 'http://' + val;
			}

			$(this).val(val);
		});
	};

	$.fn.wpcf7NotValidTip = function(message) {
		return this.each(function() {
			var $into = $(this);

			$into.find('span.wpcf7-not-valid-tip').remove();
			$into.append('<span role="alert" class="wpcf7-not-valid-tip">' + message + '</span>');

			if ($into.is('.use-floating-validation-tip *')) {
				$('.wpcf7-not-valid-tip', $into).mouseover(function() {
					$(this).wpcf7FadeOut();
				});

				$(':input', $into).focus(function() {
					$('.wpcf7-not-valid-tip', $into).not(':hidden').wpcf7FadeOut();
				});
			}
		});
	};

	$.fn.wpcf7FadeOut = function() {
		return this.each(function() {
			$(this).animate({
				opacity: 0
			}, 'fast', function() {
				$(this).css({'z-index': -100});
			});
		});
	};

	$.fn.wpcf7OnloadRefill = function() {
		return this.each(function() {
			var url = $(this).attr('action');

			if (0 < url.indexOf('#')) {
				url = url.substr(0, url.indexOf('#'));
			}

			var id = $(this).find('input[name="_wpcf7"]').val();
			var unitTag = $(this).find('input[name="_wpcf7_unit_tag"]').val();

			$.getJSON(url,
				{ _wpcf7_is_ajax_call: 1, _wpcf7: id, _wpcf7_request_ver: $.now() },
				function(data) {
					if (data && data.captcha) {
						$('#' + unitTag).wpcf7RefillCaptcha(data.captcha);
					}

					if (data && data.quiz) {
						$('#' + unitTag).wpcf7RefillQuiz(data.quiz);
					}
				}
			);
		});
	};

	$.fn.wpcf7RefillCaptcha = function(captcha) {
		return this.each(function() {
			var form = $(this);

			$.each(captcha, function(i, n) {
				form.find(':input[name="' + i + '"]').clearFields();
				form.find('img.wpcf7-captcha-' + i).attr('src', n);
				var match = /([0-9]+)\.(png|gif|jpeg)$/.exec(n);
				form.find('input:hidden[name="_wpcf7_captcha_challenge_' + i + '"]').attr('value', match[1]);
			});
		});
	};

	$.fn.wpcf7RefillQuiz = function(quiz) {
		return this.each(function() {
			var form = $(this);

			$.each(quiz, function(i, n) {
				form.find(':input[name="' + i + '"]').clearFields();
				form.find(':input[name="' + i + '"]').siblings('span.wpcf7-quiz-label').text(n[0]);
				form.find('input:hidden[name="_wpcf7_quiz_answer_' + i + '"]').attr('value', n[1]);
			});
		});
	};

	$.fn.wpcf7ClearResponseOutput = function() {
		return this.each(function() {
			$(this).find('div.wpcf7-response-output').hide().empty().removeClass('wpcf7-mail-sent-ok wpcf7-mail-sent-ng wpcf7-validation-errors wpcf7-spam-blocked').removeAttr('role');
			$(this).find('span.wpcf7-not-valid-tip').remove();
			$(this).find('img.ajax-loader').css({ visibility: 'hidden' });
		});
	};

	$.wpcf7UpdateScreenReaderResponse = function($form, data) {
		$('.wpcf7 .screen-reader-response').html('').attr('role', '');

		if (data.message) {
			var $response = $form.siblings('.screen-reader-response').first();
			$response.append(data.message);

			if (data.invalids) {
				var $invalids = $('<ul></ul>');

				$.each(data.invalids, function(i, n) {
					if (n.idref) {
						var $li = $('<li></li>').append($('<a></a>').attr('href', '#' + n.idref).append(n.message));
					} else {
						var $li = $('<li></li>').append(n.message);
					}

					$invalids.append($li);
				});

				$response.append($invalids);
			}

			$response.attr('role', 'alert').focus();
		}
	};

	$.wpcf7SupportHtml5 = function() {
		var features = {};
		var input = document.createElement('input');

		features.placeholder = 'placeholder' in input;

		var inputTypes = ['email', 'url', 'tel', 'number', 'range', 'date'];

		$.each(inputTypes, function(index, value) {
			input.setAttribute('type', value);
			features[value] = input.type !== 'text';
		});

		return features;
	};

	$(function() {
		_wpcf7.supportHtml5 = $.wpcf7SupportHtml5();
		$('div.wpcf7 > form').wpcf7InitForm();
	});

})(jQuery);
/*!
 * typeahead.js 0.9.0
 * https://github.com/twitter/typeahead
 * Copyright 2013 Twitter, Inc. and other contributors; Licensed MIT
 */

//(function(t){var e="0.9.0",i={isMsie:function(){var t=/(msie) ([\w.]+)/i.exec(navigator.userAgent);return t?parseInt(t[2],10):!1},isBlankString:function(t){return!t||/^\s*$/.test(t)},escapeRegExChars:function(t){return t.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g,"\\$&")},isString:function(t){return"string"==typeof t},isNumber:function(t){return"number"==typeof t},isArray:t.isArray,isFunction:t.isFunction,isObject:t.isPlainObject,isUndefined:function(t){return t===void 0},bind:t.proxy,bindAll:function(e){var i;for(var n in e)t.isFunction(i=e[n])&&(e[n]=t.proxy(i,e))},indexOf:function(t,e){for(var i=0;t.length>i;i++)if(t[i]===e)return i;return-1},each:t.each,map:t.map,filter:t.grep,every:function(e,i){var n=!0;return e?(t.each(e,function(t,s){return(n=i.call(null,s,t,e))?void 0:!1}),!!n):n},some:function(e,i){var n=!1;return e?(t.each(e,function(t,s){return(n=i.call(null,s,t,e))?!1:void 0}),!!n):n},mixin:t.extend,getUniqueId:function(){var t=0;return function(){return t++}}(),defer:function(t){setTimeout(t,0)},debounce:function(t,e,i){var n,s;return function(){var r,o,a=this,u=arguments;return r=function(){n=null,i||(s=t.apply(a,u))},o=i&&!n,clearTimeout(n),n=setTimeout(r,e),o&&(s=t.apply(a,u)),s}},throttle:function(t,e){var i,n,s,r,o,a;return o=0,a=function(){o=new Date,s=null,r=t.apply(i,n)},function(){var u=new Date,c=e-(u-o);return i=this,n=arguments,0>=c?(clearTimeout(s),s=null,o=u,r=t.apply(i,n)):s||(s=setTimeout(a,c)),r}},tokenizeQuery:function(e){return t.trim(e).toLowerCase().split(/[\s]+/)},tokenizeText:function(e){return t.trim(e).toLowerCase().split(/[\s\-_]+/)},getProtocol:function(){return location.protocol},noop:function(){}},n=function(){var t=/\s+/;return{on:function(e,i){var n;if(!i)return this;for(this._callbacks=this._callbacks||{},e=e.split(t);n=e.shift();)this._callbacks[n]=this._callbacks[n]||[],this._callbacks[n].push(i);return this},trigger:function(e,i){var n,s;if(!this._callbacks)return this;for(e=e.split(t);n=e.shift();)if(s=this._callbacks[n])for(var r=0;s.length>r;r+=1)s[r].call(this,{type:n,data:i});return this}}}(),s=function(){function e(e){e&&e.el||t.error("EventBus initialized without el"),this.$el=t(e.el)}var n="typeahead:";return i.mixin(e.prototype,{trigger:function(t){var e=[].slice.call(arguments,1);this.$el.trigger(n+t,e)}}),e}(),r=function(){function t(t){this.prefix=["__",t,"__"].join(""),this.ttlKey="__ttl__",this.keyMatcher=RegExp("^"+this.prefix)}function e(){return(new Date).getTime()}function n(t){return JSON.stringify(i.isUndefined(t)?null:t)}function s(t){return JSON.parse(t)}var r,o=window.localStorage;return r=window.localStorage&&window.JSON?{_prefix:function(t){return this.prefix+t},_ttlKey:function(t){return this._prefix(t)+this.ttlKey},get:function(t){return this.isExpired(t)&&this.remove(t),s(o.getItem(this._prefix(t)))},set:function(t,s,r){return i.isNumber(r)?o.setItem(this._ttlKey(t),n(e()+r)):o.removeItem(this._ttlKey(t)),o.setItem(this._prefix(t),n(s))},remove:function(t){return o.removeItem(this._ttlKey(t)),o.removeItem(this._prefix(t)),this},clear:function(){var t,e,i=[],n=o.length;for(t=0;n>t;t++)(e=o.key(t)).match(this.keyMatcher)&&i.push(e.replace(this.keyMatcher,""));for(t=i.length;t--;)this.remove(i[t]);return this},isExpired:function(t){var n=s(o.getItem(this._ttlKey(t)));return i.isNumber(n)&&e()>n?!0:!1}}:{get:i.noop,set:i.noop,remove:i.noop,clear:i.noop,isExpired:i.noop},i.mixin(t.prototype,r),t}(),o=function(){function t(t){i.bindAll(this),t=t||{},this.sizeLimit=t.sizeLimit||10,this.cache={},this.cachedKeysByAge=[]}return i.mixin(t.prototype,{get:function(t){return this.cache[t]},set:function(t,e){var i;this.cachedKeysByAge.length===this.sizeLimit&&(i=this.cachedKeysByAge.shift(),delete this.cache[i]),this.cache[t]=e,this.cachedKeysByAge.push(t)}}),t}(),a=function(){function e(t){i.bindAll(this),t=i.isString(t)?{url:t}:t,u=u||new o,a=i.isNumber(t.maxParallelRequests)?t.maxParallelRequests:a||6,this.url=t.url,this.wildcard=t.wildcard||"%QUERY",this.filter=t.filter,this.replace=t.replace,this.ajaxSettings={type:"get",cache:t.cache,timeout:t.timeout,dataType:t.dataType||"json",beforeSend:t.beforeSend},this.get=(/^throttle$/i.test(t.rateLimitFn)?i.throttle:i.debounce)(this.get,t.rateLimitWait||300)}function n(){c++}function s(){c--}function r(){return a>c}var a,u,c=0;return i.mixin(e.prototype,{get:function(e,i){function o(t){t=l.filter?l.filter(t):t,i&&i(t),u.set(c,t)}function a(){s(),l.onDeckRequestArgs&&(l.get.apply(l,l.onDeckRequestArgs),l.onDeckRequestArgs=null)}var c,h,l=this,d=encodeURIComponent(e||"");c=this.replace?this.replace(this.url,d):this.url.replace(this.wildcard,d),(h=u.get(c))?i&&i(h):r()?(n(),t.ajax(c,this.ajaxSettings).done(o).always(a)):this.onDeckRequestArgs=[].slice.call(arguments,0)}}),e}(),u=function(){function n(e){i.bindAll(this),e.template&&!e.engine&&t.error("no template engine specified"),e.local||e.prefetch||e.remote||t.error("one of local, prefetch, or remote is requried"),this.name=e.name||i.getUniqueId(),this.limit=e.limit||5,this.header=e.header,this.footer=e.footer,this.valueKey=e.valueKey||"value",this.template=s(e.template,e.engine,this.valueKey),this.local=e.local,this.prefetch=e.prefetch,this.remote=e.remote,this.keys={version:"version",protocol:"protocol",itemHash:"itemHash",adjacencyList:"adjacencyList"},this.itemHash={},this.adjacencyList={},this.storage=e.name?new r(e.name):null}function s(t,e,i){var n,s='<div class="tt-suggestion">%body</div>';return n=t?e.compile(s.replace("%body",t)):{render:function(t){return s.replace("%body","<p>"+t[i]+"</p>")}}}return i.mixin(n.prototype,{_processLocalData:function(t){this._mergeProcessedData(this._processData(t))},_loadPrefetchData:function(n){function s(t){var s=n.filter?n.filter(t):t,r=l._processData(s),o=r.itemHash,a=r.adjacencyList;l.storage&&(l.storage.set(l.keys.itemHash,o,n.ttl),l.storage.set(l.keys.adjacencyList,a,n.ttl),l.storage.set(l.keys.version,e,n.ttl),l.storage.set(l.keys.protocol,i.getProtocol(),n.ttl)),l._mergeProcessedData(r)}var r,o,a,u,c,h,l=this;return this.storage&&(o=this.storage.get(this.keys.version),a=this.storage.get(this.keys.protocol),u=this.storage.get(this.keys.itemHash),c=this.storage.get(this.keys.adjacencyList),h=o!==e||a!==i.getProtocol()),n=i.isString(n)?{url:n}:n,n.ttl=i.isNumber(n.ttl)?n.ttl:864e5,u&&c&&!h?(this._mergeProcessedData({itemHash:u,adjacencyList:c}),r=t.Deferred().resolve()):r=t.getJSON(n.url).done(s),r},_transformDatum:function(t){var e=i.isString(t)?t:t[this.valueKey],n=t.tokens||i.tokenizeText(e),s={value:e,tokens:n};return i.isString(t)?(s.datum={},s.datum[this.valueKey]=t):s.datum=t,s.tokens=i.filter(s.tokens,function(t){return!i.isBlankString(t)}),s.tokens=i.map(s.tokens,function(t){return t.toLowerCase()}),s},_processData:function(t){var e=this,n={},s={};return i.each(t,function(t,r){var o=e._transformDatum(r),a=i.getUniqueId(o.value);n[a]=o,i.each(o.tokens,function(t,e){var n=e.charAt(0),r=s[n]||(s[n]=[a]);!~i.indexOf(r,a)&&r.push(a)})}),{itemHash:n,adjacencyList:s}},_mergeProcessedData:function(t){var e=this;i.mixin(this.itemHash,t.itemHash),i.each(t.adjacencyList,function(t,i){var n=e.adjacencyList[t];e.adjacencyList[t]=n?n.concat(i):i})},_getLocalSuggestions:function(t){var e,n=this,s=[],r=[],o=[];return i.each(t,function(t,e){var n=e.charAt(0);!~i.indexOf(s,n)&&s.push(n)}),i.each(s,function(t,i){var s=n.adjacencyList[i];return s?(r.push(s),(!e||s.length<e.length)&&(e=s),void 0):!1}),r.length<s.length?[]:(i.each(e,function(e,s){var a,u,c=n.itemHash[s];a=i.every(r,function(t){return~i.indexOf(t,s)}),u=a&&i.every(t,function(t){return i.some(c.tokens,function(e){return 0===e.indexOf(t)})}),u&&o.push(c)}),o)},initialize:function(){var e;return this.local&&this._processLocalData(this.local),this.transport=this.remote?new a(this.remote):null,e=this.prefetch?this._loadPrefetchData(this.prefetch):t.Deferred().resolve(),this.local=this.prefetch=this.remote=null,this.initialize=function(){return e},e},getSuggestions:function(t,e){function n(t){o=o.slice(0),i.each(t,function(t,e){var n,r=s._transformDatum(e);return n=i.some(o,function(t){return r.value===t.value}),!n&&o.push(r),o.length<s.limit}),e&&e(o)}var s=this,r=i.tokenizeQuery(t),o=this._getLocalSuggestions(r).slice(0,this.limit);e&&e(o),o.length<this.limit&&this.transport&&this.transport.get(t,n)}}),n}(),c=function(){function e(e){var n=this;i.bindAll(this),this.specialKeyCodeMap={9:"tab",27:"esc",37:"left",39:"right",13:"enter",38:"up",40:"down"},this.$hint=t(e.hint),this.$input=t(e.input).on("blur.tt",this._handleBlur).on("focus.tt",this._handleFocus).on("keydown.tt",this._handleSpecialKeyEvent),i.isMsie()?this.$input.on("keydown.tt keypress.tt cut.tt paste.tt",function(t){n.specialKeyCodeMap[t.which||t.keyCode]||i.defer(n._compareQueryToInputValue)}):this.$input.on("input.tt",this._compareQueryToInputValue),this.query=this.$input.val(),this.$overflowHelper=s(this.$input)}function s(e){return t("<span></span>").css({position:"absolute",left:"-9999px",visibility:"hidden",whiteSpace:"nowrap",fontFamily:e.css("font-family"),fontSize:e.css("font-size"),fontStyle:e.css("font-style"),fontVariant:e.css("font-variant"),fontWeight:e.css("font-weight"),wordSpacing:e.css("word-spacing"),letterSpacing:e.css("letter-spacing"),textIndent:e.css("text-indent"),textRendering:e.css("text-rendering"),textTransform:e.css("text-transform")}).insertAfter(e)}function r(t,e){return t=(t||"").replace(/^\s*/g,"").replace(/\s{2,}/g," "),e=(e||"").replace(/^\s*/g,"").replace(/\s{2,}/g," "),t===e}return i.mixin(e.prototype,n,{_handleFocus:function(){this.trigger("focused")},_handleBlur:function(){this.trigger("blured")},_handleSpecialKeyEvent:function(t){var e=this.specialKeyCodeMap[t.which||t.keyCode];e&&this.trigger(e+"Keyed",t)},_compareQueryToInputValue:function(){var t=this.getInputValue(),e=r(this.query,t),i=e?this.query.length!==t.length:!1;i?this.trigger("whitespaceChanged",{value:this.query}):e||this.trigger("queryChanged",{value:this.query=t})},destroy:function(){this.$hint.off(".tt"),this.$input.off(".tt"),this.$hint=this.$input=this.$overflowHelper=null},focus:function(){this.$input.focus()},blur:function(){this.$input.blur()},getQuery:function(){return this.query},getInputValue:function(){return this.$input.val()},setInputValue:function(t,e){this.$input.val(t),e!==!0&&this._compareQueryToInputValue()},getHintValue:function(){return this.$hint.val()},setHintValue:function(t){this.$hint.val(t)},getLanguageDirection:function(){return(this.$input.css("direction")||"ltr").toLowerCase()},isOverflow:function(){return this.$overflowHelper.text(this.getInputValue()),this.$overflowHelper.width()>this.$input.width()},isCursorAtEnd:function(){var t,e=this.$input.val().length,n=this.$input[0].selectionStart;return i.isNumber(n)?n===e:document.selection?(t=document.selection.createRange(),t.moveStart("character",-e),e===t.text.length):!0}}),e}(),h=function(){function e(e){i.bindAll(this),this.isOpen=!1,this.isEmpty=!0,this.isMouseOverDropdown=!1,this.$menu=t(e.menu).on("mouseenter.tt",this._handleMouseenter).on("mouseleave.tt",this._handleMouseleave).on("click.tt",".tt-suggestion",this._handleSelection).on("mouseover.tt",".tt-suggestion",this._handleMouseover)}function s(t){return t.data("suggestion")}var r={suggestionsList:'<span class="tt-suggestions"></span>'},o={suggestionsList:{display:"block"},suggestion:{whiteSpace:"nowrap",cursor:"pointer"},suggestionChild:{whiteSpace:"normal"}};return i.mixin(e.prototype,n,{_handleMouseenter:function(){this.isMouseOverDropdown=!0},_handleMouseleave:function(){this.isMouseOverDropdown=!1},_handleMouseover:function(e){var i=t(e.currentTarget);this._getSuggestions().removeClass("tt-is-under-cursor"),i.addClass("tt-is-under-cursor")},_handleSelection:function(e){var i=t(e.currentTarget);this.trigger("suggestionSelected",s(i))},_show:function(){this.$menu.css("display","block")},_hide:function(){this.$menu.hide()},_moveCursor:function(t){var e,i,n,r;if(this.isVisible()){if(e=this._getSuggestions(),i=e.filter(".tt-is-under-cursor"),i.removeClass("tt-is-under-cursor"),n=e.index(i)+t,n=(n+1)%(e.length+1)-1,-1===n)return this.trigger("cursorRemoved"),void 0;-1>n&&(n=e.length-1),r=e.eq(n).addClass("tt-is-under-cursor"),this.trigger("cursorMoved",s(r))}},_getSuggestions:function(){return this.$menu.find(".tt-suggestions > .tt-suggestion")},destroy:function(){this.$menu.off(".tt"),this.$menu=null},isVisible:function(){return this.isOpen&&!this.isEmpty},closeUnlessMouseIsOverDropdown:function(){this.isMouseOverDropdown||this.close()},close:function(){this.isOpen&&(this.isOpen=!1,this._hide(),this.$menu.find(".tt-suggestions > .tt-suggestion").removeClass("tt-is-under-cursor"),this.trigger("closed"))},open:function(){this.isOpen||(this.isOpen=!0,!this.isEmpty&&this._show(),this.trigger("opened"))},setLanguageDirection:function(t){var e={left:"0",right:"auto"},i={left:"auto",right:" 0"};"ltr"===t?this.$menu.css(e):this.$menu.css(i)},moveCursorUp:function(){this._moveCursor(-1)},moveCursorDown:function(){this._moveCursor(1)},getSuggestionUnderCursor:function(){var t=this._getSuggestions().filter(".tt-is-under-cursor").first();return t.length>0?s(t):null},getFirstSuggestion:function(){var t=this._getSuggestions().first();return t.length>0?s(t):null},renderSuggestions:function(e,n){var s,a,u,c,h="tt-dataset-"+e.name,l=this.$menu.find("."+h);0===l.length&&(s=t(r.suggestionsList).css(o.suggestionsList),l=t("<div></div>").addClass(h).append(e.header).append(s).append(e.footer).appendTo(this.$menu)),n.length>0?(this.isEmpty=!1,this.isOpen&&this._show(),a=document.createElement("div"),u=document.createDocumentFragment(),i.each(n,function(i,n){a.innerHTML=e.template.render(n.datum),c=t(a.firstChild).css(o.suggestion).data("suggestion",n),c.children().each(function(){t(this).css(o.suggestionChild)}),u.appendChild(c[0])}),l.show().find(".tt-suggestions").html(u)):this.clearSuggestions(e.name),this.trigger("suggestionsRendered")},clearSuggestions:function(t){var e=t?this.$menu.find(".tt-dataset-"+t):this.$menu.find('[class^="tt-dataset-"]'),i=e.find(".tt-suggestions");e.hide(),i.empty(),0===this._getSuggestions().length&&(this.isEmpty=!0,this._hide())}}),e}(),l=function(){function e(t){var e,n,r;i.bindAll(this),this.$node=s(t.input),this.datasets=t.datasets,this.dir=null,this.eventBus=t.eventBus,e=this.$node.find(".tt-dropdown-menu"),n=this.$node.find(".tt-query"),r=this.$node.find(".tt-hint"),this.dropdownView=new h({menu:e}).on("suggestionSelected",this._handleSelection).on("cursorMoved",this._clearHint).on("cursorMoved",this._setInputValueToSuggestionUnderCursor).on("cursorRemoved",this._setInputValueToQuery).on("cursorRemoved",this._updateHint).on("suggestionsRendered",this._updateHint).on("opened",this._updateHint).on("closed",this._clearHint).on("opened closed",this._propagateEvent),this.inputView=new c({input:n,hint:r}).on("focused",this._openDropdown).on("blured",this._closeDropdown).on("blured",this._setInputValueToQuery).on("enterKeyed",this._handleSelection).on("queryChanged",this._clearHint).on("queryChanged",this._clearSuggestions).on("queryChanged",this._getSuggestions).on("whitespaceChanged",this._updateHint).on("queryChanged whitespaceChanged",this._openDropdown).on("queryChanged whitespaceChanged",this._setLanguageDirection).on("escKeyed",this._closeDropdown).on("escKeyed",this._setInputValueToQuery).on("tabKeyed upKeyed downKeyed",this._managePreventDefault).on("upKeyed downKeyed",this._moveDropdownCursor).on("upKeyed downKeyed",this._openDropdown).on("tabKeyed leftKeyed rightKeyed",this._autocomplete)}function s(e){var i=t(o.wrapper),n=t(o.dropdown),s=t(e),r=t(o.hint);i=i.css(a.wrapper),n=n.css(a.dropdown),r.css(a.hint).css({backgroundAttachment:s.css("background-attachment"),backgroundClip:s.css("background-clip"),backgroundColor:s.css("background-color"),backgroundImage:s.css("background-image"),backgroundOrigin:s.css("background-origin"),backgroundPosition:s.css("background-position"),backgroundRepeat:s.css("background-repeat"),backgroundSize:s.css("background-size")}),s.data("ttAttrs",{dir:s.attr("dir"),autocomplete:s.attr("autocomplete"),spellcheck:s.attr("spellcheck"),style:s.attr("style")}),s.addClass("tt-query").attr({autocomplete:"off",spellcheck:!1}).css(a.query);try{!s.attr("dir")&&s.attr("dir","auto")}catch(u){}return s.wrap(i).parent().prepend(r).append(n)}function r(t){var e=t.find(".tt-query");i.each(e.data("ttAttrs"),function(t,n){i.isUndefined(n)?e.removeAttr(t):e.attr(t,n)}),e.detach().removeData("ttAttrs").removeClass("tt-query").insertAfter(t),t.remove()}var o={wrapper:'<span class="twitter-typeahead"></span>',hint:'<input class="tt-hint" type="text" autocomplete="off" spellcheck="off" disabled>',dropdown:'<span class="tt-dropdown-menu"></span>'},a={wrapper:{position:"relative",display:"inline-block"},hint:{position:"absolute",top:"0",left:"0",borderColor:"transparent",boxShadow:"none"},query:{position:"relative",verticalAlign:"top",backgroundColor:"transparent"},dropdown:{position:"absolute",top:"100%",left:"0",zIndex:"100",display:"none"}};return i.isMsie()&&i.mixin(a.query,{backgroundImage:"url(data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7)"}),i.isMsie()&&7>=i.isMsie()&&(i.mixin(a.wrapper,{display:"inline",zoom:"1"}),i.mixin(a.query,{marginTop:"-1px"})),i.mixin(e.prototype,n,{_managePreventDefault:function(t){var e,i,n=t.data,s=!1;switch(t.type){case"tabKeyed":e=this.inputView.getHintValue(),i=this.inputView.getInputValue(),s=e&&e!==i;break;case"upKeyed":case"downKeyed":s=!n.shiftKey&&!n.ctrlKey&&!n.metaKey}s&&n.preventDefault()},_setLanguageDirection:function(){var t=this.inputView.getLanguageDirection();t!==this.dir&&(this.dir=t,this.$node.css("direction",t),this.dropdownView.setLanguageDirection(t))},_updateHint:function(){var t,e,n,s,r,o=this.dropdownView.getFirstSuggestion(),a=o?o.value:null,u=this.dropdownView.isVisible(),c=this.inputView.isOverflow();a&&u&&!c&&(t=this.inputView.getInputValue(),e=t.replace(/\s{2,}/g," ").replace(/^\s+/g,""),n=i.escapeRegExChars(e),s=RegExp("^(?:"+n+")(.*$)","i"),r=s.exec(a),this.inputView.setHintValue(t+(r?r[1]:"")))},_clearHint:function(){this.inputView.setHintValue("")},_clearSuggestions:function(){this.dropdownView.clearSuggestions()},_setInputValueToQuery:function(){this.inputView.setInputValue(this.inputView.getQuery())},_setInputValueToSuggestionUnderCursor:function(t){var e=t.data;this.inputView.setInputValue(e.value,!0)},_openDropdown:function(){this.dropdownView.open()},_closeDropdown:function(t){this.dropdownView["blured"===t.type?"closeUnlessMouseIsOverDropdown":"close"]()},_moveDropdownCursor:function(t){var e=t.data;e.shiftKey||e.ctrlKey||e.metaKey||this.dropdownView["upKeyed"===t.type?"moveCursorUp":"moveCursorDown"]()},_handleSelection:function(t){var e="suggestionSelected"===t.type,n=e?t.data:this.dropdownView.getSuggestionUnderCursor();n&&(this.inputView.setInputValue(n.value),e?this.inputView.focus():t.data.preventDefault(),e&&i.isMsie()?i.defer(this.dropdownView.close):this.dropdownView.close(),this.eventBus.trigger("selected",n.datum))},_getSuggestions:function(){var t=this,e=this.inputView.getQuery();i.isBlankString(e)||i.each(this.datasets,function(i,n){n.getSuggestions(e,function(i){e===t.inputView.getQuery()&&t.dropdownView.renderSuggestions(n,i)})})},_autocomplete:function(t){var e,i,n,s,r;("rightKeyed"!==t.type&&"leftKeyed"!==t.type||(e=this.inputView.isCursorAtEnd(),i="ltr"===this.inputView.getLanguageDirection()?"leftKeyed"===t.type:"rightKeyed"===t.type,e&&!i))&&(n=this.inputView.getQuery(),s=this.inputView.getHintValue(),""!==s&&n!==s&&(r=this.dropdownView.getFirstSuggestion(),this.inputView.setInputValue(r.value)))},_propagateEvent:function(t){this.eventBus.trigger(t.type)},destroy:function(){this.inputView.destroy(),this.dropdownView.destroy(),r(this.$node),this.$node=null}}),e}();(function(){var e,n={},r="ttView";e={initialize:function(e){function o(){var e,n=t(this),o=new s({el:n});e=i.map(a,function(t){return t.initialize()}),n.data(r,new l({input:n,eventBus:o=new s({el:n}),datasets:a})),t.when.apply(t,e).always(function(){i.defer(function(){o.trigger("initialized")})})}var a;return e=i.isArray(e)?e:[e],0===this.length&&t.error("typeahead initialized without DOM element"),0===e.length&&t.error("no datasets provided"),a=i.map(e,function(t){var e=n[t.name]?n[t.name]:new u(t);return t.name&&(n[t.name]=e),e}),this.each(o)},destroy:function(){this.each(function(){var e=t(this),i=e.data(r);i&&(i.destroy(),e.removeData(r))})}},jQuery.fn.typeahead=function(t){return e[t]?e[t].apply(this,[].slice.call(arguments,1)):e.initialize.apply(this,arguments)}})()})(window.jQuery);
//var Hogan={};(function(j,h){j.Template=function(o,p,n,m){this.r=o||this.r;this.c=n;this.options=m;this.text=p||"";this.buf=(h)?[]:""};j.Template.prototype={r:function(o,n,m){return""},v:c,t:e,render:function b(o,n,m){return this.ri([o],n||{},m)},ri:function(o,n,m){return this.r(o,n,m)},rp:function(o,q,p,m){var n=p[o];if(!n){return""}if(this.c&&typeof n=="string"){n=this.c.compile(n,this.options)}return n.ri(q,p,m)},rs:function(p,o,q){var m=p[p.length-1];if(!g(m)){q(p,o,this);return}for(var n=0;n<m.length;n++){p.push(m[n]);q(p,o,this);p.pop()}},s:function(s,n,q,o,t,m,p){var r;if(g(s)&&s.length===0){return false}if(typeof s=="function"){s=this.ls(s,n,q,o,t,m,p)}r=(s==="")||!!s;if(!o&&r&&n){n.push((typeof s=="object")?s:n[n.length-1])}return r},d:function(q,n,p,r){var s=q.split("."),t=this.f(s[0],n,p,r),m=null;if(q==="."&&g(n[n.length-2])){return n[n.length-1]}for(var o=1;o<s.length;o++){if(t&&typeof t=="object"&&s[o] in t){m=t;t=t[s[o]]}else{t=""}}if(r&&!t){return false}if(!r&&typeof t=="function"){n.push(m);t=this.lv(t,n,p);n.pop()}return t},f:function(q,m,p,r){var t=false,n=null,s=false;for(var o=m.length-1;o>=0;o--){n=m[o];if(n&&typeof n=="object"&&q in n){t=n[q];s=true;break}}if(!s){return(r)?false:""}if(!r&&typeof t=="function"){t=this.lv(t,m,p)}return t},ho:function(s,m,p,r,o){var q=this.c;var n=this.options;n.delimiters=o;var r=s.call(m,r);r=(r==null)?String(r):r.toString();this.b(q.compile(r,n).render(m,p));return false},b:(h)?function(m){this.buf.push(m)}:function(m){this.buf+=m},fl:(h)?function(){var m=this.buf.join("");this.buf=[];return m}:function(){var m=this.buf;this.buf="";return m},ls:function(n,u,r,o,m,p,v){var q=u[u.length-1],s=null;if(!o&&this.c&&n.length>0){return this.ho(n,q,r,this.text.substring(m,p),v)}s=n.call(q);if(typeof s=="function"){if(o){return true}else{if(this.c){return this.ho(s,q,r,this.text.substring(m,p),v)}}}return s},lv:function(q,o,p){var n=o[o.length-1];var m=q.call(n);if(typeof m=="function"){m=e(m.call(n));if(this.c&&~m.indexOf("{\u007B")){return this.c.compile(m,this.options).render(n,p)}}return e(m)}};var i=/&/g,d=/</g,a=/>/g,l=/\'/g,k=/\"/g,f=/[&<>\"\']/;function e(m){return String((m===null||m===undefined)?"":m)}function c(m){m=e(m);return f.test(m)?m.replace(i,"&amp;").replace(d,"&lt;").replace(a,"&gt;").replace(l,"&#39;").replace(k,"&quot;"):m}var g=Array.isArray||function(m){return Object.prototype.toString.call(m)==="[object Array]"}})(typeof exports!=="undefined"?exports:Hogan);(function(n){var f=/\S/,j=/\"/g,o=/\n/g,k=/\r/g,u=/\\/g,a={"#":1,"^":2,"/":3,"!":4,">":5,"<":6,"=":7,_v:8,"{":9,"&":10};n.scan=function m(G,B){var O=G.length,y=0,D=1,x=2,z=y,C=null,Q=null,P="",J=[],F=false,N=0,K=0,H="{{",M="}}";function L(){if(P.length>0){J.push(new String(P));P=""}}function A(){var S=true;for(var R=K;R<J.length;R++){S=(J[R].tag&&a[J[R].tag]<a._v)||(!J[R].tag&&J[R].match(f)===null);if(!S){return false}}return S}function I(U,R){L();if(U&&A()){for(var S=K,T;S<J.length;S++){if(!J[S].tag){if((T=J[S+1])&&T.tag==">"){T.indent=J[S].toString()}J.splice(S,1)}}}else{if(!R){J.push({tag:"\n"})}}F=false;K=J.length}function E(V,S){var U="="+M,R=V.indexOf(U,S),T=q(V.substring(V.indexOf("=",S)+1,R)).split(" ");H=T[0];M=T[1];return R+U.length-1}if(B){B=B.split(" ");H=B[0];M=B[1]}for(N=0;N<O;N++){if(z==y){if(w(H,G,N)){--N;L();z=D}else{if(G.charAt(N)=="\n"){I(F)}else{P+=G.charAt(N)}}}else{if(z==D){N+=H.length-1;Q=a[G.charAt(N+1)];C=Q?G.charAt(N+1):"_v";if(C=="="){N=E(G,N);z=y}else{if(Q){N++}z=x}F=N}else{if(w(M,G,N)){J.push({tag:C,n:q(P),otag:H,ctag:M,i:(C=="/")?F-M.length:N+H.length});P="";N+=M.length-1;z=y;if(C=="{"){if(M=="}}"){N++}else{r(J[J.length-1])}}}else{P+=G.charAt(N)}}}}I(F,true);return J};function r(x){if(x.n.substr(x.n.length-1)==="}"){x.n=x.n.substring(0,x.n.length-1)}}function q(x){if(x.trim){return x.trim()}return x.replace(/^\s*|\s*$/g,"")}function w(x,B,z){if(B.charAt(z)!=x.charAt(0)){return false}for(var A=1,y=x.length;A<y;A++){if(B.charAt(z+A)!=x.charAt(A)){return false}}return true}function b(D,A,y,C){var x=[],B=null,z=null;while(D.length>0){z=D.shift();if(z.tag=="#"||z.tag=="^"||e(z,C)){y.push(z);z.nodes=b(D,z.tag,y,C);x.push(z)}else{if(z.tag=="/"){if(y.length===0){throw new Error("Closing tag without opener: /"+z.n)}B=y.pop();if(z.n!=B.n&&!g(z.n,B.n,C)){throw new Error("Nesting error: "+B.n+" vs. "+z.n)}B.end=z.i;return x}else{x.push(z)}}}if(y.length>0){throw new Error("missing closing tag: "+y.pop().n)}return x}function e(A,y){for(var z=0,x=y.length;z<x;z++){if(y[z].o==A.n){A.tag="#";return true}}}function g(B,z,y){for(var A=0,x=y.length;A<x;A++){if(y[A].c==B&&y[A].o==z){return true}}}n.generate=function(x,A,y){var z='var _=this;_.b(i=i||"");'+t(x)+"return _.fl();";if(y.asString){return"function(c,p,i){"+z+";}"}return new n.Template(new Function("c","p","i",z),A,n,y)};function v(x){return x.replace(u,"\\\\").replace(j,'\\"').replace(o,"\\n").replace(k,"\\r")}function i(x){return(~x.indexOf("."))?"d":"f"}function t(y){var B="";for(var A=0,z=y.length;A<z;A++){var x=y[A].tag;if(x=="#"){B+=h(y[A].nodes,y[A].n,i(y[A].n),y[A].i,y[A].end,y[A].otag+" "+y[A].ctag)}else{if(x=="^"){B+=s(y[A].nodes,y[A].n,i(y[A].n))}else{if(x=="<"||x==">"){B+=d(y[A])}else{if(x=="{"||x=="&"){B+=c(y[A].n,i(y[A].n))}else{if(x=="\n"){B+=l('"\\n"'+(y.length-1==A?"":" + i"))}else{if(x=="_v"){B+=p(y[A].n,i(y[A].n))}else{if(x===undefined){B+=l('"'+v(y[A])+'"')}}}}}}}}return B}function h(y,C,B,A,x,z){return"if(_.s(_."+B+'("'+v(C)+'",c,p,1),c,p,0,'+A+","+x+',"'+z+'")){_.rs(c,p,function(c,p,_){'+t(y)+"});c.pop();}"}function s(x,z,y){return"if(!_.s(_."+y+'("'+v(z)+'",c,p,1),c,p,1,0,0,"")){'+t(x)+"};"}function d(x){return'_.b(_.rp("'+v(x.n)+'",c,p,"'+(x.indent||"")+'"));'}function c(y,x){return"_.b(_.t(_."+x+'("'+v(y)+'",c,p,0)));'}function p(y,x){return"_.b(_.v(_."+x+'("'+v(y)+'",c,p,0)));'}function l(x){return"_.b("+x+");"}n.parse=function(y,z,x){x=x||{};return b(y,"",[],x.sectionTags||[])},n.cache={};n.compile=function(A,x){x=x||{};var z=A+"||"+!!x.asString;var y=this.cache[z];if(y){return y}y=this.generate(this.parse(this.scan(A,x.delimiters),A,x),A,x);return this.cache[z]=y}})(typeof exports!=="undefined"?exports:Hogan);
