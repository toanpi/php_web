function BrowseServer( startupPath, functionData ){
    var finder = new CKFinder();
    finder.basePath = '../../../public/admin/ckfinder/';
    finder.startupPath = startupPath;
    finder.selectActionFunction = SetFileField;
    finder.selectActionData = functionData;
    finder.popup(); 
} 

function SetFileField( fileUrl, data ){
    document.getElementById( data["selectActionData"] ).value = fileUrl;
}
  
function ShowThumbnails( fileUrl, data ){	
    var sFileName = this.getSelectedFile().name;
    document.getElementById( 'thumbnails' ).innerHTML +=
    '<div class="thumb" style="width:80px">' +
    '<img src="' + fileUrl + '" />' +
    '<div class="caption">' +
    '<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '<\/a> (' + data["fileSize"] + 'KB)' +
    '<\/div>' +
    '<\/div>';
    document.getElementById( 'preview' ).style.display = "";
    return false;
}

function checkall(class_name, obj) {
		//Duyệt qua các checkbox có class = class_name (item)
		//Trả về các phần tử ở dạng mảng, bắt dầu từ vị trí 0;
		var items = document.getElementsByClassName(class_name);
		if(obj.checked == true) //Đã được chọn
		{
			for(i=0; i < items.length ; i++)
				items[i].checked = true;
		}
		else { //Checkbox chưa được chọn
			for(i=0; i < items.length ; i++)
				items[i].checked = false;
		}
}

function udp_stt(url,col,obj) {
    var value = $(obj).val();
    var add = url+col+'/'+value;
    window.location= add;
}

function udp_status(url,key,col,value) {
    var add = url+key+'/'+col+'/'+value;
    window.location= add;
}

function updateTtTB(tb,p,id,tt){
      var tb = tb;
      var idU = id;
      var page = p;
      var tt = tt;
      window.location="controller/update_controller.php?act=updateTtTB&tb="+tb+"&page="+page+"&id="+idU+"&tt="+tt;
}

function updateSttImg(tb,p,id,loai,obj) {
    var value = $(obj).val();
    window.location="controller/update_controller.php?act=updateSttImg&tb="+tb+"&page="+p+"&id="+id+"&loai="+loai+"&v="+value;
}

function updateTtImg(tb,p,id,loai,tt){
     window.location="controller/update_controller.php?act=updateTtImg&tb="+tb+"&page="+p+"&id="+id+"&loai="+loai+"&tt="+tt;
}

function updateNhom(id,n,nhom,p){
      window.location="controller/update_controller.php?act=updateNhom&nhom="+nhom+"&id="+id+"&n="+n+"&page="+p;
}
