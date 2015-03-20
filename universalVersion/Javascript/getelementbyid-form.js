function trim(str) {
  return str.replace(/^\s+|\s+$/g, '');
}

function checkEmail(email)
{	
	
  var pattern=/^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
  
  if(pattern.test(email)) {         
	return true;
  } else {   
	return false; 
  }

}

function toggleFormVisibility()
{
  var frm_element = document.getElementById('subscribe_frm'); 
  var sub_link_element = document.getElementById('sub');
  var nosub_link_element = document.getElementById('nosub');

  var vis = frm_element.style;
  
  if(vis.display=='' || vis.display=='none') {
	  vis.display = 'block';
	  sub_link_element.style.display='none';
	  nosub_link_element.style.display='';
  } else {
	  vis.display = 'none';
	  sub_link_element.style.display='block';
	  nosub_link_element.style.display='none';
  }

}
