var data = '';

window.onload = function()
{
	document.querySelector("#new").addEventListener("click", Add);
	init();
};

function init()
{
	var cookies = document.cookie;
	var tab = cookies.split(";");
	for (var t in tab)
	{
		if (tab[t].indexOf("ft_list") != -1)
		{
			var value = tab[t].split("=")[1];
			data = value;
			var ntab = value.split(":");
			for (var val in ntab)
				if (ntab[val])
					createElem(unescape(ntab[val]), false);
			break;
		}
	}
	return (cookies);
};

function Add()
{
	var res = prompt("Add todo:", "");
	if (res != null)
		createElem(res, true);
};

function createElem(text, create)
{
	var parent = document.getElementById("ft_list");
	var div = document.createElement("div");
	div.textContent = text;
	div.onclick = deleteElem;
	if (parent)
		parent.insertBefore(div, parent.firstChild);
	if (create == true)
	{
		data += escape(text) + ":";
		document.cookie = "ft_list=" + data +  ";" + expires();
	}
};

function deleteElem(event)
{
	var res = confirm("Are you sure you want to remove todo?");
	if (res)
	{
		var id = get_id(event.target);
		var ntab = data.split(":");
		data = '';
		for (var i = 0; i < ntab.length; i++)
			if (ntab[i] && i != id)
				data += ntab[i] + ":";
		var parent = document.getElementById("ft_list");
		parent.removeChild(event.target);
		document.cookie = "ft_list=" + data + ";" + expires();
	}
};

function get_id(event)
{
	var div = document.getElementById("ft_list");
	var tab = div.getElementsByTagName('div');
	for (var i in tab)
		if (tab[i] == event)
			return ((tab.length - 1) - i);
	return (-1);
};

function expires()
{
	var d = new Date();
	d.setTime(d.getTime() + (24*60*60*1000));
	return ("expires=" + d.toUTCString());
};
