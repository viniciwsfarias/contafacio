$(function() {
	$("pesquisa").keyup(function() {
		var pesquisa = $(this).val();

		if(pesquisa != ''){
			var dados = {
				palavra : pesquisa
			}
			$.post(certificados.php, dados, function(retorna){
				$(".resultado").html(retorna);
			});
		}
	});

});

var data = [
    {
        value: 300,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Red"
    },
    {
        value: 50,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "Green"
    },
    {
        value: 100,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Yellow"
    }
];

var ctx = document.getElementById("myChart").getContext("2d");
new Chart(ctx).Pie(data);
//new Chart(ctx).Doughnut(data);