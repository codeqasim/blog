<p style="margin-bottom: -34px; width: 100%; text-align: center;">Powered by &nbsp;<a target="_blank" href="http://phpblogscript.com"> <strong> PHP Blog Script</strong></a></p>

<footer>
<?=$app->footer_code?>
<div class="contain">

<ul class="fr social">
<?php if (!empty($app->whatsapp_url)){?><li><a target="_blank" href="<?=$app->whatsapp_url?>" class="wa"><img src="<?=root?>assets/front/fonts/whatsapp.svg" alt="whatsapp" /></a></li><?php } ?>
<?php if (!empty($app->facebook_url)){?><li><a target="_blank" href="<?=$app->facebook_url?>" class="fb"><img src="<?=root?>assets/front/fonts/facebook.svg" alt="facebook" /></a></li><?php } ?>
<?php if (!empty($app->twitter_url)){?><li><a target="_blank" href="<?=$app->twitter_url?>" class="tw"><img src="<?=root?>assets/front/fonts/twitter.svg" alt="twitter" /></a></li><?php } ?>
<?php if (!empty($app->linkedin_url)){?><li><a target="_blank" href="<?=$app->linkedin_url?>" class="li"><img src="<?=root?>assets/front/fonts/linkedin.svg" alt="linkedin" /></a></li><?php } ?>
<?php if (!empty($app->instagram_url)){?><li><a target="_blank" href="<?=$app->instagram_url?>" class="ig"><img src="<?=root?>assets/front/fonts/instagram.svg" alt="instagram" /></a></li><?php } ?>
<?php if (!empty($app->pinterest_url)){?><li><a target="_blank" href="<?=$app->pinterest_url?>" class="pr"><img src="<?=root?>assets/front/fonts/pinterest.svg" alt="pinterest" /></a></li><?php } ?>
</ul>

<form action="<?=root?>newsletters" method="post">
<div class="row newsletter">
<div class="c3">
<h2>Newsletter</h2>
<p>Subscribe to stay tune</p>
</div>
<div class="c2">
<input type="text" name="name" placeholder="Your name" required/>
</div>
<div class="c3">
<input type="email" name="email" placeholder="Your email address" required/>
</div>
<div class="c2">
<button type="submit" class="btn b">Submit</button>
</div>
</div>
</form>

<div class="row foot">
 <div class="c6"><a href="<?=root?>" class="brand"> <?=$app->app_name?></a></div>
 <div class="c6 fr">
  <ul>
   <li><a href="<?=root?>">Home</a></li>
   <?php if ($pages->num_rows > 0) { foreach($pages as $nav) { ?>
   <li><a href="<?=$nav['slug']?>"><?=$nav['title']?></a></li>
   <?php } } ?>
   <li><a href="<?=root?>sitemap.xml" target="_blank">Sitemap</a></li>
  </ul>
 </div>
</div>
</div>
</footer>

<script>
/*! Waves v0.7.6  */
(function(window,factory){'use strict';if(typeof define==='function'&&define.amd){define([],function(){window.Waves=factory.call(window);return window.Waves})}else if(typeof exports==='object'){module.exports=factory.call(window)}else{window.Waves=factory.call(window)}})(typeof global==='object'?global:this,function(){'use strict';var Waves=Waves||{};var $$=document.querySelectorAll.bind(document);var toString=Object.prototype.toString;var isTouchAvailable='ontouchstart' in window;function isWindow(obj){return obj!==null&&obj===obj.window}
function getWindow(elem){return isWindow(elem)?elem:elem.nodeType===9&&elem.defaultView}
function isObject(value){var type=typeof value;return type==='function'||type==='object'&&!!value}
function isDOMNode(obj){return isObject(obj)&&obj.nodeType>0}
function getWavesElements(nodes){var stringRepr=toString.call(nodes);if(stringRepr==='[object String]'){return $$(nodes)}else if(isObject(nodes)&&/^\[object (Array|HTMLCollection|NodeList|Object)\]$/.test(stringRepr)&&nodes.hasOwnProperty('length')){return nodes}else if(isDOMNode(nodes)){return[nodes]}
return[]}
function offset(elem){var docElem,win,box={top:0,left:0},doc=elem&&elem.ownerDocument;docElem=doc.documentElement;if(typeof elem.getBoundingClientRect!==typeof undefined){box=elem.getBoundingClientRect()}
win=getWindow(doc);return{top:box.top+win.pageYOffset-docElem.clientTop,left:box.left+win.pageXOffset-docElem.clientLeft}}
function convertStyle(styleObj){var style='';for(var prop in styleObj){if(styleObj.hasOwnProperty(prop)){style+=(prop+':'+styleObj[prop]+';')}}
return style}
var Effect={duration:750,delay:200,show:function(e,element,velocity){if(e.button===2){return!1}
element=element||this;var ripple=document.createElement('div');ripple.className='waves-ripple waves-rippling';element.appendChild(ripple);var pos=offset(element);var relativeY=0;var relativeX=0;if('touches' in e&&e.touches.length){relativeY=(e.touches[0].pageY-pos.top);relativeX=(e.touches[0].pageX-pos.left)}else{relativeY=(e.pageY-pos.top);relativeX=(e.pageX-pos.left)}
relativeX=relativeX>=0?relativeX:0;relativeY=relativeY>=0?relativeY:0;var scale='scale('+((element.clientWidth/100)*3)+')';var translate='translate(0,0)';if(velocity){translate='translate('+(velocity.x)+'px, '+(velocity.y)+'px)'}
ripple.setAttribute('data-hold',Date.now());ripple.setAttribute('data-x',relativeX);ripple.setAttribute('data-y',relativeY);ripple.setAttribute('data-scale',scale);ripple.setAttribute('data-translate',translate);var rippleStyle={top:relativeY+'px',left:relativeX+'px'};ripple.classList.add('waves-notransition');ripple.setAttribute('style',convertStyle(rippleStyle));ripple.classList.remove('waves-notransition');rippleStyle['-webkit-transform']=scale+' '+translate;rippleStyle['-moz-transform']=scale+' '+translate;rippleStyle['-ms-transform']=scale+' '+translate;rippleStyle['-o-transform']=scale+' '+translate;rippleStyle.transform=scale+' '+translate;rippleStyle.opacity='1';var duration=e.type==='mousemove'?2500:Effect.duration;rippleStyle['-webkit-transition-duration']=duration+'ms';rippleStyle['-moz-transition-duration']=duration+'ms';rippleStyle['-o-transition-duration']=duration+'ms';rippleStyle['transition-duration']=duration+'ms';ripple.setAttribute('style',convertStyle(rippleStyle))},hide:function(e,element){element=element||this;var ripples=element.getElementsByClassName('waves-rippling');for(var i=0,len=ripples.length;i<len;i++){removeRipple(e,element,ripples[i])}
if(isTouchAvailable){element.removeEventListener('touchend',Effect.hide);element.removeEventListener('touchcancel',Effect.hide)}
element.removeEventListener('mouseup',Effect.hide);element.removeEventListener('mouseleave',Effect.hide)}};var TagWrapper={input:function(element){var parent=element.parentNode;if(parent.tagName.toLowerCase()==='i'&&parent.classList.contains('waves-effect')){return}
var wrapper=document.createElement('i');wrapper.className=element.className+' waves-input-wrapper';element.className='waves-button-input';parent.replaceChild(wrapper,element);wrapper.appendChild(element);var elementStyle=window.getComputedStyle(element,null);var color=elementStyle.color;var backgroundColor=elementStyle.backgroundColor;wrapper.setAttribute('style','color:'+color+';background:'+backgroundColor);element.setAttribute('style','background-color:rgba(0,0,0,0);')},img:function(element){var parent=element.parentNode;if(parent.tagName.toLowerCase()==='i'&&parent.classList.contains('waves-effect')){return}
var wrapper=document.createElement('i');parent.replaceChild(wrapper,element);wrapper.appendChild(element)}};function removeRipple(e,el,ripple){if(!ripple){return}
ripple.classList.remove('waves-rippling');var relativeX=ripple.getAttribute('data-x');var relativeY=ripple.getAttribute('data-y');var scale=ripple.getAttribute('data-scale');var translate=ripple.getAttribute('data-translate');var diff=Date.now()-Number(ripple.getAttribute('data-hold'));var delay=350-diff;if(delay<0){delay=0}
if(e.type==='mousemove'){delay=150}
var duration=e.type==='mousemove'?2500:Effect.duration;setTimeout(function(){var style={top:relativeY+'px',left:relativeX+'px',opacity:'0','-webkit-transition-duration':duration+'ms','-moz-transition-duration':duration+'ms','-o-transition-duration':duration+'ms','transition-duration':duration+'ms','-webkit-transform':scale+' '+translate,'-moz-transform':scale+' '+translate,'-ms-transform':scale+' '+translate,'-o-transform':scale+' '+translate,'transform':scale+' '+translate};ripple.setAttribute('style',convertStyle(style));setTimeout(function(){try{el.removeChild(ripple)}catch(e){return!1}},duration)},delay)}
var TouchHandler={touches:0,allowEvent:function(e){var allow=!0;if(/^(mousedown|mousemove)$/.test(e.type)&&TouchHandler.touches){allow=!1}
return allow},registerEvent:function(e){var eType=e.type;if(eType==='touchstart'){TouchHandler.touches+=1}else if(/^(touchend|touchcancel)$/.test(eType)){setTimeout(function(){if(TouchHandler.touches){TouchHandler.touches-=1}},500)}}};function getWavesEffectElement(e){if(TouchHandler.allowEvent(e)===!1){return null}
var element=null;var target=e.target||e.srcElement;while(target.parentElement){if((!(target instanceof SVGElement))&&target.classList.contains('waves-effect')){element=target;break}
target=target.parentElement}
return element}
function showEffect(e){var element=getWavesEffectElement(e);if(element!==null){if(element.disabled||element.getAttribute('disabled')||element.classList.contains('disabled')){return}
TouchHandler.registerEvent(e);if(e.type==='touchstart'&&Effect.delay){var hidden=!1;var timer=setTimeout(function(){timer=null;Effect.show(e,element)},Effect.delay);var hideEffect=function(hideEvent){if(timer){clearTimeout(timer);timer=null;Effect.show(e,element)}
if(!hidden){hidden=!0;Effect.hide(hideEvent,element)}
removeListeners()};var touchMove=function(moveEvent){if(timer){clearTimeout(timer);timer=null}
hideEffect(moveEvent);removeListeners()};element.addEventListener('touchmove',touchMove,!1);element.addEventListener('touchend',hideEffect,!1);element.addEventListener('touchcancel',hideEffect,!1);var removeListeners=function(){element.removeEventListener('touchmove',touchMove);element.removeEventListener('touchend',hideEffect);element.removeEventListener('touchcancel',hideEffect)}}else{Effect.show(e,element);if(isTouchAvailable){element.addEventListener('touchend',Effect.hide,!1);element.addEventListener('touchcancel',Effect.hide,!1)}
element.addEventListener('mouseup',Effect.hide,!1);element.addEventListener('mouseleave',Effect.hide,!1)}}}
Waves.init=function(options){var body=document.body;options=options||{};if('duration' in options){Effect.duration=options.duration}
if('delay' in options){Effect.delay=options.delay}
if(isTouchAvailable){body.addEventListener('touchstart',showEffect,!1);body.addEventListener('touchcancel',TouchHandler.registerEvent,!1);body.addEventListener('touchend',TouchHandler.registerEvent,!1)}
body.addEventListener('mousedown',showEffect,!1)};Waves.attach=function(elements,classes){elements=getWavesElements(elements);if(toString.call(classes)==='[object Array]'){classes=classes.join(' ')}
classes=classes?' '+classes:'';var element,tagName;for(var i=0,len=elements.length;i<len;i++){element=elements[i];tagName=element.tagName.toLowerCase();if(['input','img'].indexOf(tagName)!==-1){TagWrapper[tagName](element);element=element.parentElement}
if(element.className.indexOf('waves-effect')===-1){element.className+=' waves-effect'+classes}}};Waves.ripple=function(elements,options){elements=getWavesElements(elements);var elementsLen=elements.length;options=options||{};options.wait=options.wait||0;options.position=options.position||null;if(elementsLen){var element,pos,off,centre={},i=0;var mousedown={type:'mousedown',button:1};var hideRipple=function(mouseup,element){return function(){Effect.hide(mouseup,element)}};for(;i<elementsLen;i++){element=elements[i];pos=options.position||{x:element.clientWidth/2,y:element.clientHeight/2};off=offset(element);centre.x=off.left+pos.x;centre.y=off.top+pos.y;mousedown.pageX=centre.x;mousedown.pageY=centre.y;Effect.show(mousedown,element);if(options.wait>=0&&options.wait!==null){var mouseup={type:'mouseup',button:1};setTimeout(hideRipple(mouseup,element),options.wait)}}}};Waves.calm=function(elements){elements=getWavesElements(elements);var mouseup={type:'mouseup',button:1};for(var i=0,len=elements.length;i<len;i++){Effect.hide(mouseup,elements[i])}};Waves.displayEffect=function(options){console.error('Waves.displayEffect() has been deprecated and will be removed in future version. Please use Waves.init() to initialize Waves effect');Waves.init(options)};return Waves})

// This is ok.
Waves.init();
// Waves.attach('', ['waves-button', 'waves-float']);
// Waves.attach('a');
Waves.attach('.brand');
Waves.attach('button');
Waves.attach('');
Waves.attach('nav a');
</script>
</body>
</html>