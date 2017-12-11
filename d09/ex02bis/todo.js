var data = '';

$(document).ready(function()
{
	$("#new").click(Add);
	if ($.cookie("ft_list"))
		init();
});

function init()
{
	var cookies = $.cookie("ft_list");
	var tab = cookies;
	data = tab;
	var ntab = tab.split(":");
	for (var val in ntab)
	{
		if (ntab[val])
			createElem(unescape(ntab[val]), false);
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
	var parent = $("#ft_list")[0];
	var div = $("<div></div>").text(text);
	$(div).click(deleteElem);
	if (parent)
		$(parent).prepend(div, parent.firstChild);
	if (create == true)
	{
		data += escape(text) + ":";
		$.cookie("ft_list", data, {expires : 30});
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
		var parent = $("#ft_list")[0];
		$(event.target).remove();
		$.cookie("ft_list", data, {expires : 30});
	}
};

function get_id(event)
{
	var div = $("#ft_list")[0];
	var tab = $("div");
	for (var i in tab)
		if (tab[i] == event)
			return ((tab.length - 1) - i);
	return (-1);
};
