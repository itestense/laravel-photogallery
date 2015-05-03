var items;
var xmlhttp;
function ClientSideUpdate()
{
	var result;
	if(xmlhttp.readyState == 4){
	//Success	
	}
}
function updategallery(updateUrl)
{
	var dA = document.getElementById('gallery-drop-area');
	var items = dA.querySelectorAll('a[draggable=true]');
	var p_items = [];
	for(var i=0;i<items.length;i++){
		p_items.push(items[i].getAttribute('photoid'));
	}
	var reqdata = {"photos":p_items}
	xmlhttp=new XMLHttpRequest();
	xmlhttp.open('PUT', updateUrl, true);
	xmlhttp.setRequestHeader("Content-type","application/json");
	xmlhttp.onreadystatechange = ClientSideUpdate;
	xmlhttp.send(JSON.stringify(reqdata));
}
var dragItems;
var dropAreas = document.querySelectorAll('[droppable=true]');
var addEvent = (function()
	{
		if(document.addEventListener){
			return function(el,type,fn) {
				if(el && el.nodeName || el === window){
					el.addEventListener(type,fn,false);
				} else if(el && el.length){
					for(var i=0;i<el.length;i++)
					{
						addEvent(el[i],type,fn);
					}
				}
			};
		} else {
			return function(el,type,fn){
				if(el && el.nodeName || el === window){
					el.attachEvent('on'+type, function()
				{
					return fn.call(el, window.event);
				});
				} else if (el && el.length){
					for(var i=0;i<el.length;i++)
					{
						addEvent(el[i],type,fn);
					}
				}
			};
		}
	})();
function cancel(event)
{
	if(event.preventDefault)
		event.preventDefault();
	return false;
}
function prepareItems()
{	
	dragItems = document.querySelectorAll('[draggable=true]');
	for(var i=0;i<dragItems.length;i++)
	{
		addEvent(dragItems[i],'dragstart',function(event){
			event.dataTransfer.setData('o_id',this.getAttribute('photoid'));
		});
	}
}

prepareItems();
addEvent(dropAreas, 'dragleave',function(event){
	if(event.preventDefault)
		event.preventDefault();
	return false;
});
addEvent(dropAreas, 'dragover', function(event){
	if(event.preventDefault)
		event.preventDefault();
	return false;

});
addEvent(dropAreas, 'dragenter', cancel);
addEvent(dropAreas, 'drop', function(event){
	if(event.preventDefault)
		event.preventDefault();
	var obj = event.dataTransfer.getData('o_id');
	var src = document.querySelector("[photoid='"+obj+"']");
	var orig_image = src.childNodes[0];
	orig_image.parentNode.parentNode.removeChild(orig_image.parentNode);
	this.innerHTML+='<a photoid="'+src.getAttribute('photoid')+'" draggable="true"><img style="max-width:100px;" src="'+orig_image.src+'"></a>';
	prepareItems();
	return false;
});
