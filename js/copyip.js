function copyText(el) {
  var $tmp = ($("<textarea>"));
  $("body").append($tmp);
  $tmp.val($(el).text()).select();
  document.execCommand("copy");
  $tmp.remove();
  alert("IP скопирован");
}