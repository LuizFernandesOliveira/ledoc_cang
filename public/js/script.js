

c = 0;
du = "";

function mostraLogin() {
    if (document.getElementById('div').style.display === "none") {
        document.getElementById('div').style.display = "inline";
    } else {
        document.getElementById('div').style.display = "none";
    }
}

function trocaMenu(dv, n) {
    for (i = 1; i <= n; i++) {
        if (i == dv) {
            if (du != dv) {
                document.getElementById('mydiv' + i).style.display = "inline";
                du = dv;
            } else {
                du = "";
                document.getElementById('mydiv' + i).style.display = "none";
            }
        } else {
            document.getElementById('mydiv' + i).style.display = "none"
        }
    }
}

c = 0;
du = "";

function mCD(dv, n) {
    for (i = 1; i <= n; i++) {
        if (i == dv) {
            if (du != dv) {
                document.getElementById('contD' + i).style.display = "inline";
                document.getElementById('input_m' + i).value = "Menos";
                du = dv;
            } else {
                du = "";
                document.getElementById('contD' + i).style.display = "none";
                document.getElementById('input_m' + i).value = "Mais";
            }
        } else {
            document.getElementById('contD' + i).style.display = "none";
            document.getElementById('input_m' + i).value = "Mais";
        }
    }
}
