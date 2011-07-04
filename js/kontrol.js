function classToHash(opt){
	var param = new Hash();
	$A(document.getElementsByClassName(opt)).each(function(s){
		param.set(s.name,s.value);
	});
	return param;
}
function getSync(targetUrl,targetId,errorId,param){
	var errMess = false;
	new Ajax.Request(targetUrl, {
		method: 'post',
		parameters: param,
		onload: $('load').show(),
		onComplete: function(response) {
			$(targetId).innerHTML = response.responseText;
			if($(errorId)!=null){
				var errMess = $(errorId).value;
			}
			if(errMess){
				var param 	= 'pesan=' + errMess;
				getErr('pesan.php','load',param);
			}
			else{
				$('load').hide();
			}
		}
	});
}
function getAsync(targetUrl,targetId,param){
	new Ajax.Request(targetUrl, {
		asynchronous: false,
		method: 'post',
		parameters: param,
		onComplete: function(response) {
			$(targetId).innerHTML = response.responseText;
		}
	});
}
function getErr(targetUrl,targetId,param){
	new Ajax.Request(targetUrl, {
		method: 'post',
		parameters: param,
		onComplete: function(response) {
			$(targetId).insert(response.responseText);
		}
	});
}
function buka(opt){
	var param 		= new Hash();
	var param     	= classToHash(opt);
	var targetId	= param.get("targetId");
	var errorId		= param.get("errorId");
	param.unset("targetId");
	getSync('interface.php',targetId,errorId,param);
}
function anyar(opt){
	var param 		= new Hash();
	var param     	= classToHash(opt);
	var targetId	= param.get("targetId");
	param.unset("targetId");
	new Ajax.Request('interface.php', {
		method: 'post',
		parameters: param,
		onComplete: function(response) {
			$(targetId).innerHTML = response.responseText;
		}
	});
}
function nonghol(opt){
	$('peringatan').show();
	var param 		= new Hash();
	var param     	= classToHash(opt);
	getErr('interface.php','peringatan',param);
}
function peringatan(opt){
	$('load').show();
	var param 		= classToHash(opt);
	var targetId	= param.get('targetId');
	var messParam	= new Hash();
	messParam.set('pesan',param.get('pesan'));
	messParam.set('kelas',opt);
	getErr('peringatan.php',targetId,messParam);
}
function periksa(opt){
	$('load').show();
	var param 	= new Hash();
	var param 	= classToHash(opt);
	var cekId	= param.get('cekId');
	var cekMess	= param.get('cekMess');
	var errMess = false;
	getAsync('interface.php',cekId,param);
	param.unset('cekUrl');
	if($(cekMess)!=null){
		var errMess = $(cekMess).value;
		if(errMess){
			var param 	= 'pesan=' + errMess;
			getErr('pesan.php','load',param);
		}
		else{
			$('load').hide();
		}
	}
	if(!errMess){
		var targetUrl 	= param.get("targetUrl");
		var targetId	= param.get("targetId");
		var errorId		= param.get("errorId");
		getSync('interface.php',targetId,errorId,param);
	}
}
function dashboard(opt){
	var param 	= new Hash();
	var param 	= classToHash(opt);
	var targetId  = param.get("targetId");
	new Ajax.PeriodicalUpdater(targetId, "interface.php",{
		method: "post", frequency: 3, decay: 2, parameters: param
	});
}
function tutup(opt){
	var param 	= new Hash();
	$(opt).remove();
	getAsync('kosong.php','peringatan',param);
	$('peringatan').hide();
	$('load').hide();
	anyar('refresh');
}

function cetakin(opt){
	var param 		= classToHash(opt);
	var targetId 	= param.get('targetId');
	var targetUrl	= param.get('targetUrl');
	param.unset('targetId');
	param.unset('targetUrl');
	window.open(targetUrl + '?' + param.toQueryString(),targetId,'height=600,width=1024,scrollbars=1,toolbar=0,location=0,status=0,menubar=0,resizable=0');
}