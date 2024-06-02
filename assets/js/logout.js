const get_session = (cb) => {
	$.get("session.php", function(data, status){
		if (status == "success") {
			let response = JSON.parse(data);
			cb(response);
		};
	});
}

$(document).ready(function() {
	get_session(function(data) {
		if (data["in_session"]) {
			$("#loginButton").text("Log out");
			$("#loginButton").attr("href", "logout.php");
		};

		if (data["id_session"] != 4) {
			$("#adminButton").hide();
		};
	});
});