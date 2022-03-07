function getXmlHttp() {
    var xmlhttp;
    try {
      xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
    try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
      xmlhttp = false;
    }
    }
    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
      xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
  }

  //ОТправка данных для входа
  function sendpostauth() {
    var login = document.getElementById("Login").value;
    var pass = document.getElementById("Password").value; 
    var request = getXmlHttp();
    request.open('POST', 'Controllers/login.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send("Login=" + encodeURIComponent(login) + "&Password=" + encodeURIComponent(pass));
    request.onreadystatechange = function() { 
      if (request.readyState == 4) { 
        if(request.status == 200) { 
          document.getElementById("error").innerHTML = request.responseText;
        }
        if(document.getElementById("error").innerHTML == ""){
            window.location.reload();
        }
      }
    };
  }

  //Отпровка данных для регистрации
  function sendpostreg() {
    var name = document.getElementById("Name").value;
    var login = document.getElementById("Login").value;
    var pass = document.getElementById("Password").value;
    var request = getXmlHttp();
    request.open('POST', 'Controllers/signup.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send("Name=" + encodeURIComponent(name) + "&Login=" + encodeURIComponent(login) + "&Password=" + encodeURIComponent(pass));
    request.onreadystatechange = function() { 
      if (request.readyState == 4) { 
        if(request.status == 200) { 
          document.getElementById("error").innerHTML = request.responseText;
        }
        if(document.getElementById("error").innerHTML == ""){
            window.location.href = "/"
        }
      }
    };
  }



function $_GET(key) {
  var p = window.location.search;
  p = p.match(new RegExp(key + '=([^&=]+)'));
  return p ? p[1] : false;
}

