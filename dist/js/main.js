/*!
 * Theme Name: Fontaine v1.0.0: A lightweight theme based on the awesome front-end boilerplate called Kraken [http://github.com/cferdinandi/kraken] and WordPress framework called Keel, both by Chris Ferdinandi [http://gomakethings.com]
 * (c) 2016 Author: Vijay Rudraraju
 * MIT License
 * Theme URI: https://github.com/vjdesign/fontaine
 */

/*!
 * keel v5.4.0: A lightweight boilerplate for WordPress developers
 * (c) 2015 Chris Ferdinandi
 * MIT License
 * http://github.com/cferdinandi/keel
 */


 $( document ).ready(function() {
     $('.more-content').hide();
 		$('.more-link').on('click',function(){
 			$('.more-content').slideToggle('slow');
 		});
 });

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

 /**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
 ( function() {
 var nav = document.getElementById( 'site-navigation' ), menu;
 var button = document.getElementById( 'toggleMenu' );

 if ( ! nav )
   return;
 menu   = nav.getElementsByTagName( 'ul' )[0];
 if ( ! button )
   return;

 // Hide button if menu is missing or empty.
 if ( ! menu || ! menu.childNodes.length ) {
   button.style.display = 'none';
   return;
 }

 button.onclick = function() {
   if ( -1 == menu.className.indexOf( 'nav-menu' ) )
     menu.className = 'nav-menu';

   if ( -1 != button.className.indexOf( 'toggled-on' ) ) {
     button.className = button.className.replace( ' toggled-on', '' );
     menu.className = menu.className.replace( ' toggled-on', '' );
   } else {
     button.className += ' toggled-on';
     menu.className += ' toggled-on';
   }
 };




 } )();


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

/* woocommerce add-to-cart */
jQuery(function(a){return"undefined"==typeof wc_add_to_cart_params?!1:void a(document).on("click",".add_to_cart_button",function(){var b=a(this);if(b.is(".product_type_simple")){if(!b.attr("data-product_id"))return!0;b.removeClass("added"),b.addClass("loading");var c={};return a.each(b.data(),function(a,b){c[a]=b}),a(document.body).trigger("adding_to_cart",[b,c]),a.post(wc_add_to_cart_params.wc_ajax_url.toString().replace("%%endpoint%%","add_to_cart"),c,function(c){if(c){var d=window.location.toString();if(d=d.replace("add-to-cart","added-to-cart"),c.error&&c.product_url)return void(window.location=c.product_url);if("yes"===wc_add_to_cart_params.cart_redirect_after_add)return void(window.location=wc_add_to_cart_params.cart_url);b.removeClass("loading");var e=c.fragments,f=c.cart_hash;e&&a.each(e,function(b){a(b).addClass("updating")}),a(".shop_table.cart, .updating, .cart_totals").fadeTo("400","0.6").block({message:null,overlayCSS:{opacity:.6}}),b.addClass("added"),wc_add_to_cart_params.is_cart||0!==b.parent().find(".added_to_cart").size()||b.after(' <a href="'+wc_add_to_cart_params.cart_url+'" class="added_to_cart wc-forward" title="'+wc_add_to_cart_params.i18n_view_cart+'">'+wc_add_to_cart_params.i18n_view_cart+"</a>"),e&&a.each(e,function(b,c){a(b).replaceWith(c)}),a(".widget_shopping_cart, .updating").stop(!0).css("opacity","1").unblock(),a(".shop_table.cart").load(d+" .shop_table.cart:eq(0) > *",function(){a(".shop_table.cart").stop(!0).css("opacity","1").unblock(),a(document.body).trigger("cart_page_refreshed")}),a(".cart_totals").load(d+" .cart_totals:eq(0) > *",function(){a(".cart_totals").stop(!0).css("opacity","1").unblock()}),a(document.body).trigger("added_to_cart",[e,f,b])}}),!1}return!0})});

/*! Right-Height v4.1.0 | (c) 2015 Chris Ferdinandi | MIT License | http://github.com/cferdinandi/right-height */
!function(t,e){"function"==typeof define&&define.amd?define([],e(t)):"object"==typeof exports?module.exports=e(t):t.rightHeight=e(t)}("undefined"!=typeof global?global:this.window||this.global,function(t){"use strict";var e,n,o,r={},i="querySelector"in document&&"addEventListener"in t,c={selector:"[data-right-height]",selectorContent:"[data-right-height-content]",callback:function(){}},l=function(t,e,n){if("[object Object]"===Object.prototype.toString.call(t))for(var o in t)Object.prototype.hasOwnProperty.call(t,o)&&e.call(n,t[o],o,t);else for(var r=0,i=t.length;i>r;r++)e.call(n,t[r],r,t)},u=function(){var t={},e=!1,n=0,o=arguments.length;"[object Boolean]"===Object.prototype.toString.call(arguments[0])&&(e=arguments[0],n++);for(var r=function(n){for(var o in n)Object.prototype.hasOwnProperty.call(n,o)&&(e&&"[object Object]"===Object.prototype.toString.call(n[o])?t[o]=u(!0,t[o],n[o]):t[o]=n[o])};o>n;n++){var i=arguments[n];r(i)}return t},a=function(t){var e=0;if(t.offsetParent)do e+=t.offsetTop,t=t.offsetParent;while(t);return e>=0?e:0},f=function(t){var e=t.item(0),n=t.item(1);return e&&n?a(e)-a(n)===0?!1:!0:!1},s=function(t){t.style.height="",t.style.minHeight=""},g=function(t,e){return t.offsetHeight>e&&(e=t.offsetHeight),e},d=function(t,e){t.style.height=e+"px"};r.adjustContainerHeight=function(t,e){var n=u(n||c,e||{}),o=t.querySelectorAll(n.selectorContent),r=f(o),i="0";l(o,function(t){s(t)}),r||(l(o,function(t){i=g(t,i)}),l(o,function(t){d(t,i)})),n.callback(t)};var h=function(){l(n,function(t){r.adjustContainerHeight(t,e)})},p=function(){o||(o=setTimeout(function(){o=null,h(n,e)},66))};return r.destroy=function(){e&&(l(n,function(t){var n=t.querySelectorAll(e.selectorContent);l(n,function(t){s(t)})}),t.removeEventListener("resize",p,!1),e=null,n=null,o=null)},r.init=function(o){i&&(r.destroy(),e=u(c,o||{}),n=document.querySelectorAll(e.selector),h(n,o),t.addEventListener("load",h,!1),t.addEventListener("resize",p,!1))},r});

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

/*
HTML5 Number polyfill | Jonathan Stipe | https://github.com/jonstipe/number-polyfill
*/

(function() {
  (function($) {
    var i, numberPolyfill;
    i = document.createElement("input");
    i.setAttribute("type", "number");
    if (i.type === "text") {
      $.fn.inputNumber = function() {
        $(this).filter(function() {
          var $this;
          $this = $(this);
          return $this.is('input[type="number"]') && !($this.parent().is("span") && $this.next().is("div.number-spin-btn-container") && $this.next().children().first().is("div.number-spin-btn-up") && $this.next().children().eq(1).is("div.number-spin-btn-down"));
        }).each(function() {
          numberPolyfill.polyfills.push(new numberPolyfill(this));
        });
        return $(this);
      };
      numberPolyfill = function(elem) {
        var $fieldContainer, MutationObserver, attrObserver, halfHeight,
          _this = this;
        this.elem = $(elem);
        if (!(this.elem.is(":root *") && this.elem.height() > 0)) {
          throw new Error("Element must be in DOM and displayed so that its height can be measured.");
        }
        halfHeight = (this.elem.outerHeight() / 2) + 'px';
        this.upBtn = $('<div/>', {
          "class": 'number-spin-btn number-spin-btn-up',
          style: "height: " + halfHeight
        });
        this.downBtn = $('<div/>', {
          "class": 'number-spin-btn number-spin-btn-down',
          style: "height: " + halfHeight
        });
        this.btnContainer = $('<div/>', {
          "class": 'number-spin-btn-container'
        });
        $fieldContainer = $('<span/>', {
          style: "white-space: nowrap"
        });
        this.upBtn.appendTo(this.btnContainer);
        this.downBtn.appendTo(this.btnContainer);
        this.elem.wrap($fieldContainer);
        this.btnContainer.insertAfter(this.elem);
        this.elem.on({
          focus: function(e) {
            _this.elem.on({
              DOMMouseScroll: numberPolyfill.domMouseScrollHandler,
              mousewheel: numberPolyfill.mouseWheelHandler
            }, {
              p: _this
            });
          },
          blur: function(e) {
            _this.elem.off({
              DOMMouseScroll: numberPolyfill.domMouseScrollHandler,
              mousewheel: numberPolyfill.mouseWheelHandler
            });
          }
        });
        this.elem.on({
          keypress: numberPolyfill.elemKeypressHandler,
          change: numberPolyfill.elemChangeHandler
        }, {
          p: this
        });
        this.upBtn.on("mousedown", {
          p: this,
          func: "increment"
        }, numberPolyfill.elemBtnMousedownHandler);
        this.downBtn.on("mousedown", {
          p: this,
          func: "decrement"
        }, numberPolyfill.elemBtnMousedownHandler);
        this.elem.css("textAlign", 'right');
        this.attrMutationHandler("class");
        if ((typeof WebKitMutationObserver !== "undefined" && WebKitMutationObserver !== null) || (typeof MutationObserver !== "undefined" && MutationObserver !== null)) {
          if ((typeof WebKitMutationObserver !== "undefined" && WebKitMutationObserver !== null) && (typeof MutationObserver === "undefined" || MutationObserver === null)) {
            MutationObserver = WebKitMutationObserver;
          }
          attrObserver = new MutationObserver(function(mutations, observer) {
            var mutation, _i, _len;
            for (_i = 0, _len = mutations.length; _i < _len; _i++) {
              mutation = mutations[_i];
              if (mutation.type === "attributes") {
                _this.attrMutationHandler(mutation.attributeName, mutation.oldValue, _this.elem.attr(mutation.attributeName));
              }
            }
          });
          attrObserver.observe(elem, {
            attributes: true,
            attributeOldValue: true,
            attributeFilter: ["class", "style", "min", "max", "step"]
          });
        } else if (typeof MutationEvent !== "undefined" && MutationEvent !== null) {
          this.elem.on("DOMAttrModified", function(evt) {
            _this.attrMutationHandler(evt.originalEvent.attrName, evt.originalEvent.prevValue, evt.originalEvent.newValue);
          });
        }
      };
      numberPolyfill.polyfills = [];
      numberPolyfill.isNumber = function(input) {
        if ((input != null) && typeof input.toString === "function") {
          return /^-?\d+(?:\.\d+)?$/.test(input.toString());
        } else {
          return false;
        }
      };
      numberPolyfill.isFloat = function(input) {
        if ((input != null) && typeof input.toString === "function") {
          return /^-?\d+\.\d+$/.test(input.toString());
        } else {
          return false;
        }
      };
      numberPolyfill.isInt = function(input) {
        if ((input != null) && typeof input.toString === "function") {
          return /^-?\d+$/.test(input.toString());
        } else {
          return false;
        }
      };
      numberPolyfill.isNegative = function(input) {
        if ((input != null) && typeof input.toString === "function") {
          return /^-\d+(?:\.\d+)?$/.test(input.toString());
        } else {
          return false;
        }
      };
      numberPolyfill.raiseNum = function(num) {
        var a, numi, nump;
        if (typeof num === "number" || (typeof num === "object" && num instanceof Number)) {
          if (num % 1) {
            return {
              num: num.toString(),
              precision: 0
            };
          } else {
            return numberPolyfill.raiseNum(num.toString());
          }
        } else if (typeof num === "string" || (typeof num === "object" && num instanceof String)) {
          if (numberPolyfill.isFloat(num)) {
            num = num.replace(/(\.\d)0+$/, "$1");
            nump = numberPolyfill.getPrecision(num);
            numi = num.slice(0, -(nump + 1)) + num.slice(-nump);
            numi = numi.replace(/^(-?)0+(\d+)/, "$1$2");
            a = {
              num: numi,
              precision: nump
            };
            return a;
          } else if (numberPolyfill.isInt(num)) {
            return {
              num: num,
              precision: 0
            };
          }
        }
      };
      numberPolyfill.raiseNumPrecision = function(rNum, newPrecision) {
        var _i, _ref;
        if (rNum.precision < newPrecision) {
          for (i = _i = _ref = rNum.precision; _ref <= newPrecision ? _i < newPrecision : _i > newPrecision; i = _ref <= newPrecision ? ++_i : --_i) {
            rNum.num += "0";
          }
          rNum.precision = newPrecision;
        }
      };
      numberPolyfill.lowerNum = function(num) {
        if (num.precision > 0) {
          while (num.num.length < (num.precision + 1)) {
            if (numberPolyfill.isNegative(num.num)) {
              num.num = num.num.slice(0, 1) + "0" + num.num.slice(1);
            } else {
              num.num = "0" + num.num;
            }
          }
          return (num.num.slice(0, -num.precision) + "." + num.num.slice(-num.precision)).replace(/\.?0+$/, '').replace(/^(-?)(\.)/, "$10$2");
        } else {
          return num.num;
        }
      };
      numberPolyfill.preciseAdd = function(num1, num2) {
        var num1i, num2i, result;
        if ((typeof num1 === "number" || (typeof num1 === "object" && num1 instanceof Number)) && (typeof num2 === "number" || (typeof num2 === "object" && num2 instanceof Number))) {
          if (num1 % 1 === 0 && num2 % 1 === 0) {
            return (num1 + num2).toString();
          } else {
            return numberPolyfill.preciseAdd(num1.toString(), num2.toString());
          }
        } else if ((typeof num1 === "string" || (typeof num1 === "object" && num1 instanceof String)) && (typeof num2 === "string" || (typeof num2 === "object" && num2 instanceof String))) {
          if (numberPolyfill.isNumber(num1)) {
            if (numberPolyfill.isNumber(num2)) {
              if (numberPolyfill.isInt(num1)) {
                if (numberPolyfill.isInt(num2)) {
                  return numberPolyfill.preciseAdd(parseInt(num1, 10), parseInt(num2, 10));
                } else if (numberPolyfill.isFloat(num2)) {
                  num1 += ".0";
                }
              } else if (numberPolyfill.isFloat(num1)) {
                if (numberPolyfill.isInt(num2)) {
                  num2 += ".0";
                }
              }
              num1i = numberPolyfill.raiseNum(num1);
              num2i = numberPolyfill.raiseNum(num2);
              if (num1i.precision < num2i.precision) {
                numberPolyfill.raiseNumPrecision(num1i, num2i.precision);
              } else if (num1i.precision > num2i.precision) {
                numberPolyfill.raiseNumPrecision(num2i, num1i.precision);
              }
              result = (parseInt(num1i.num, 10) + parseInt(num2i.num, 10)).toString();
              if (num1i.precision > 0) {
                if (numberPolyfill.isNegative(result)) {
                  while (num1i.precision > (result.length - 1)) {
                    result = "-0" + result.slice(1);
                  }
                } else {
                  while (num1i.precision > result.length) {
                    result = "0" + result;
                  }
                }
                result = numberPolyfill.lowerNum({
                  num: result,
                  precision: num1i.precision
                });
              }
              result = result.replace(/^(-?)\./, '$10.');
              if (numberPolyfill.isFloat(result)) {
                result = result.replace(/0+$/, '');
              }
              return result;
            } else {
              throw new SyntaxError("Argument \"" + num2 + "\" is not a number.");
            }
          } else {
            throw new SyntaxError("Argument \"" + num1 + "\" is not a number.");
          }
        } else {
          return numberPolyfill.preciseAdd(num1.toString(), num2.toString());
        }
      };
      numberPolyfill.preciseSubtract = function(num1, num2) {
        if (typeof num2 === "number" || (typeof num2 === "object" && num2 instanceof Number)) {
          return numberPolyfill.preciseAdd(num1, -num2);
        } else if (typeof num2 === "string" || (typeof num2 === "object" && num2 instanceof String)) {
          if (numberPolyfill.isNegative(num2)) {
            return numberPolyfill.preciseAdd(num1, num2.slice(1));
          } else {
            return numberPolyfill.preciseAdd(num1, "-" + num2);
          }
        }
      };
      numberPolyfill.getPrecision = function(num) {
        var k, kNum;
        if (typeof num === "number") {
          k = 0;
          kNum = num;
          while (kNum !== Math.floor(kNum)) {
            kNum = num * Math.pow(10, ++k);
          }
          return k;
        } else if (typeof num === "string") {
          if (numberPolyfill.isNumber(num)) {
            if (numberPolyfill.isFloat(num)) {
              return /^-?\d+(?:\.(\d+))?$/.exec(num)[1].length;
            } else {
              return 0;
            }
          }
        }
      };
      numberPolyfill.prototype.getParams = function() {
        var max, min, step, val;
        step = this.elem.attr('step');
        min = this.elem.attr('min');
        max = this.elem.attr('max');
        val = this.elem.val();
        if (!numberPolyfill.isNumber(step)) {
          step = null;
        }
        if (!numberPolyfill.isNumber(min)) {
          min = null;
        }
        if (!numberPolyfill.isNumber(max)) {
          max = null;
        }
        if (!numberPolyfill.isNumber(val)) {
          val = min || 0;
        }
        return {
          min: (min != null) ? min : null,
          max: (max != null) ? max : null,
          step: (step != null) ? step : "1",
          val: (val != null) ? val : null
        };
      };
      numberPolyfill.prototype.clipValues = function(value, min, max) {
        if ((max != null) && parseFloat(value) > parseFloat(max)) {
          return max;
        } else if ((min != null) && parseFloat(value) < parseFloat(min)) {
          return min;
        } else {
          return value;
        }
      };
      numberPolyfill.prototype.stepNormalize = function(value) {
        var cValue, min, params, sn, step;
        params = this.getParams();
        step = params['step'];
        min = params['min'];
        if (step == null) {
          return value;
        } else {
          step = numberPolyfill.raiseNum(step);
          cValue = numberPolyfill.raiseNum(value);
          if (cValue.precision > step.precision) {
            numberPolyfill.raiseNumPrecision(step, cValue.precision);
          } else if (cValue.precision < step.precision) {
            numberPolyfill.raiseNumPrecision(cValue, step.precision);
          }
          if (min != null) {
            cValue = numberPolyfill.raiseNum(numberPolyfill.preciseSubtract(value, min));
            numberPolyfill.raiseNumPrecision(cValue, step.precision);
          }
          if (parseFloat(cValue.num) % parseFloat(step.num) === 0) {
            return value;
          } else {
            cValue = numberPolyfill.lowerNum({
              num: (Math.round(parseFloat(cValue.num) / (sn = parseFloat(step.num))) * sn).toString(),
              precision: cValue.precision
            });
            if (min != null) {
              cValue = numberPolyfill.preciseAdd(cValue, min);
            }
            return cValue;
          }
        }
      };
      numberPolyfill.domMouseScrollHandler = function(evt) {
        var p;
        p = evt.data.p;
        evt.preventDefault();
        if (evt.originalEvent.detail < 0) {
          p.increment();
        } else {
          p.decrement();
        }
      };
      numberPolyfill.mouseWheelHandler = function(evt) {
        var p;
        p = evt.data.p;
        evt.preventDefault();
        if (evt.originalEvent.wheelDelta > 0) {
          p.increment();
        } else {
          p.decrement();
        }
      };
      numberPolyfill.elemKeypressHandler = function(evt) {
        var p, _ref, _ref1;
        p = evt.data.p;
        if (evt.keyCode === 38) {
          p.increment();
        } else if (evt.keyCode === 40) {
          p.decrement();
        } else if (((_ref = evt.keyCode) !== 8 && _ref !== 9 && _ref !== 35 && _ref !== 36 && _ref !== 37 && _ref !== 39 && _ref !== 46) && ((_ref1 = evt.which) !== 45 && _ref1 !== 46 && _ref1 !== 48 && _ref1 !== 49 && _ref1 !== 50 && _ref1 !== 51 && _ref1 !== 52 && _ref1 !== 53 && _ref1 !== 54 && _ref1 !== 55 && _ref1 !== 56 && _ref1 !== 57)) {
          evt.preventDefault();
        }
      };
      numberPolyfill.elemChangeHandler = function(evt) {
        var min, newVal, p, params;
        p = evt.data.p;
        if (p.elem.val() !== "") {
          if (numberPolyfill.isNumber(p.elem.val())) {
            params = p.getParams();
            newVal = p.clipValues(params['val'], params['min'], params['max']);
            newVal = p.stepNormalize(newVal);
            if (newVal.toString() !== p.elem.val()) {
              p.elem.val(newVal).change();
            }
          } else {
            min = p.elem.attr('min');
            p.elem.val((min != null) && numberPolyfill.isNumber(min) ? min : "0").change();
          }
        }
      };
      numberPolyfill.elemBtnMousedownHandler = function(evt) {
        var func, p, releaseFunc, timeoutFunc,
          _this = this;
        p = evt.data.p;
        func = evt.data.func;
        p[func]();
        timeoutFunc = function(incFunc) {
          p[func]();
          p.timeoutID = window.setTimeout(timeoutFunc, 10);
        };
        releaseFunc = function(e) {
          window.clearTimeout(p.timeoutID);
          $(document).off('mouseup', releaseFunc);
          $(_this).off('mouseleave', releaseFunc);
        };
        $(document).on('mouseup', releaseFunc);
        $(this).on('mouseleave', releaseFunc);
        p.timeoutID = window.setTimeout(timeoutFunc, 700);
      };
      numberPolyfill.prototype.attrMutationHandler = function(name, oldValue, newValue) {
        var ei, h, _i, _len, _ref;
        if (name === "class" || name === "style") {
          h = {};
          ei = null;
          _ref = ["opacity", "visibility", "-moz-transition-property", "-moz-transition-duration", "-moz-transition-timing-function", "-moz-transition-delay", "-webkit-transition-property", "-webkit-transition-duration", "-webkit-transition-timing-function", "-webkit-transition-delay", "-o-transition-property", "-o-transition-duration", "-o-transition-timing-function", "-o-transition-delay", "transition-property", "transition-duration", "transition-timing-function", "transition-delay"];
          for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            i = _ref[_i];
            if ((ei = this.elem.css(i)) !== this.btnContainer.css(i)) {
              h[i] = ei;
            }
          }
          if (this.elem.css("display") === "none") {
            h["display"] = "none";
          } else {
            h["display"] = "inline-block";
          }
          this.btnContainer.css(h);
        } else if (name === "min" || name === "max" || name === "step") {
          this.elem.change();
        }
      };
      numberPolyfill.prototype.increment = function() {
        var newVal, params;
        if (!(this.elem.is(":disabled") || this.elem.is("[readonly]"))) {
          params = this.getParams();
          newVal = numberPolyfill.preciseAdd(params['val'], params['step']);
          if ((params['max'] != null) && parseFloat(newVal) > parseFloat(params['max'])) {
            newVal = params['max'];
          }
          newVal = this.stepNormalize(newVal);
          this.elem.val(newVal).change();
        }
      };
      numberPolyfill.prototype.decrement = function() {
        var newVal, params;
        if (!(this.elem.is(":disabled") || this.elem.is("[readonly]"))) {
          params = this.getParams();
          newVal = numberPolyfill.preciseSubtract(params['val'], params['step']);
          if ((params['min'] != null) && parseFloat(newVal) < parseFloat(params['min'])) {
            newVal = params['min'];
          }
          newVal = this.stepNormalize(newVal);
          this.elem.val(newVal).change();
        }
      };
    } else {
      $.fn.inputNumber = function() {
        return $(this);
      };
      return;
    }
    $(function() {
      $('input[type="number"]').inputNumber();
    });
  })(jQuery);

}).call(this);
