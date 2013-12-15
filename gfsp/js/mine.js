function init () {
  console.log("init.....................");
  function getUrlVars()
  {
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');

    for(var i = 0; i < hashes.length; i++)
    {
      hash = hashes[i].split('=');
      vars.push(hash[0]);
      vars[hash[0]] = hash[1];
    }

    return vars;
  }

  var get = getUrlVars();
  document.getElementById('sqr').value = get['sqr'];
  document.getElementById('gogogo').click();
}

function item (query) {
  document.getElementById("listing_container").innerHTML="";
  console.log(query);
  bla = "http://54.228.180.124:8080/search-api/v1/akif" + query,
      console.log(bla);
  jQuery.ajax({
    type: "GET",    
    url: bla,
    dataType: "json",
    success: function(data, textStatus, jqXHR) {

      txt = "";
      txt += '<div id="listing"  class="row">';
      txt += '<ul class="results">';
      txt += '  <li class="snippet" >';
      txt += '  <b>Title: </b>' + data.results[0].languageBlocks.en.title;
      txt += '  <br><b>Status: </b>' + data.results[0].status;
      txt += '  <br> <b>Description: </b> ';
      txt += '  <span >' + data.results[0].languageBlocks.en.description + '<br></span>';
      txt += '  <br> <b>Url: </b> ';
      uurl = data.results[0].expressions[0].manifestations[0].items[0].url;
      txt += '  <span ><a href="' + uurl + '">' + uurl + '</a><br></span>';
      txt += '  <br> <b>Keywords: </b> <span >' + data.results[0].languageBlocks.en.keywords + ', &nbsp;</span>';
      txt += '  </li>';
      txt += '</ul>';
      txt += '</div>';
      document.getElementById("listing_container").innerHTML=txt;
      console.log(data);
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
    }
  });
}

function test (query) {
  document.getElementById("listing_container").innerHTML="";
  console.log(query);
  jQuery.ajax({
    type: "GET",    
    url: "http://54.228.180.124:8080/search-api/v1/akif?q=" + query,
    dataType: "json",
    success: function(data, textStatus, jqXHR) {
      console.log(data.error);
      console.log(data);

      txt = "";
      txt += '<h3 class="result_inform" >Search for "<span class="active">' + query + '</span>" returned total: <span class="active">'+data.total+'</span></h3>';
      for (var i = 0, size = data.results.length; i < size; i++) {
        txt += '<div id="listing"  class="row">';
        txt += '<ul class="results">';
        txt += '  <li class="snippet" >';
        txt += '  <b>Title: </b>' + data.results[i].languageBlocks.en.title;
        txt += '  <br> <b>Description: </b> ';
        blaa =  " ";
        blaa +=  data.results[i].languageBlocks.en.description ;
        txt += '  <span >' + blaa.substring(1,60) + '...<br></span>';
        txt += '  <br> <b>Keywords: </b> <span >' + data.results[i].languageBlocks.en.keywords + ', &nbsp;</span>';
        txt += '  <br> <button type="button" onclick="item(\'?set=' + data.results[i].set +'&identifier=' +data.results[i].identifier+ '&\');"> View More </button>';
        txt += '  </li>';
        txt += '</ul>';
        txt += '</div>';
      }
      document.getElementById("listing_container").innerHTML=txt;
      console.log(data);

    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
    }
  });
}
