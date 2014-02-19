/*
 * Digital Skills Academy. WEBELEVATE 1.2 - Internet Development Assignment
 *
 * Create a cloud-based property listings website
 * with a front end and an admin back end.
 * The site is to be driven by PHP and MySQL.
 * 
 * Date: 01 January 2013
 * @author Padraic McElroy (Student ID: D11128427)
 * 
 */

//This means 'call all content within the braces after the document is loaded  
$(function(){    
              
    //call your jquery functions 
    initBtnFilterAll();
    initBtnFilterHouseType(); 
    initBtnFilterCounty(); 
    initBtnFilterPrice(); 
    
}); 

       
//function for the filter button. 
function initBtnFilterAll(){
    
    $('#btnFilter').click(function (){
                
        var housetype = $('#typeofhouse_id').val();
        //console.log(housetype);
        var county = $('#county_id').val();
        var pricerange = $('#houseprice_id').val();
                
        // Building url with values from dropdowns
        var  url = "api/index.php?action=api_property_get_all_filtered&house_type=" + housetype + "&county=" + county + "&pricebracket=" + pricerange;
        
                
        $(".ajaxContent").empty();  
        var items = "";
        var errorMessage= "Your search was not successful. Please select different values."
       
                
        $.getJSON(url, function(json){
                    
            $.each(json, function(i,jsonItem){  
                 
                items += "<div class='row-fluid'>" 
                items += "<div class='span4'>"
                
                items += "<p><img src='uploads/"+ jsonItem['imagefile'] +"' class='property'></p>";   
                items += "</div>"
                items += "<div class='span8'>"
                items += "<p><strong>Address: </strong>" + jsonItem['address1'] + ", Co. " + jsonItem['county'] + ".</p>";
                items += "<p><strong>Price: </strong>" + jsonItem['price'] +  " Euro</p>";  
                items += "<p><strong>House Type: </strong>" +  jsonItem['house_type'] +  "</p>"; 
                items += "</div>"
                items += "</div>"

                items += "<hr />"
            });
                    
            $('#ajaxContent1').append(items);
            
            if (items == ""){
                $('#ajaxContent1').append(errorMessage);
            }
          
        }); //end of getJSON 
               
    });  //end of click function 

}

function initBtnFilterHouseType(){
    
    $('#btnFilterType').click(function (){
        
        var housetype = $('#typeofhouse_id').val();
                
        // Building url with values from dropdowns
        var  url = "api/index.php?action=api_property_get_all_by_type_id&house_type=" + housetype;
        console.log("Ajax button has been clicked");
               

        $(".ajaxContent").empty();  
        var items = "";
        var errorMessage= "Your search was unsuccessful. Please select different values." 
     
     
        $.getJSON(url, function(json){
   
            $.each(json, function(i,jsonItem){ 
                 
                items += "<div class='row-fluid'>" 
                items += "<div class='span4'>"
                
                items += "<p><img src='uploads/"+ jsonItem['imagefile'] +"' class='property'></p>";   
                items += "</div>"
                items += "<div class='span8'>"
                items += "<p><strong>Address: </strong>" + jsonItem['address1'] + ", Co. " + jsonItem['county'] + "</p>";
                items += "<p><strong>Price: </strong>" + jsonItem['price'] +  " Euro</p>";  
                items += "<p><strong>House Type: </strong>" +  jsonItem['house_type'] +  "</p>"; 
                items += "</div>"
                items += "</div>"

                items += "<hr />"
                
            });
                    
            $('#ajaxContent1').append(items);
            
            if (items == ""){
                $('#ajaxContent1').append(errorMessage);
            }
          
        }); /* end of getJSON */
        
        //window.alert("End of JSON");
               
    }); /* end of click function */

}

function initBtnFilterCounty(){
    
    $('#btnFilterCounty').click(function (){
        
        var county = $('#county_id').val();
                
        // Building url with values from dropdowns
        var  url = "api/index.php?action=api_property_get_all_by_county_id&county=" + county;
        //window.alert("Hello!");
        console.log("Ajax button has been clicked");
               

        $(".ajaxContent").empty();  
        var items = "";
        var errorMessage= "Your search was not successful. Please select different values." 
     
     
        $.getJSON(url, function(json){
   
            $.each(json, function(i,jsonItem){ 
                 
                items += "<div class='row-fluid'>" 
                items += "<div class='span4'>"
                
                items += "<p><img src='uploads/"+ jsonItem['imagefile'] +"' class='property'></p>";   
                items += "</div>"
                items += "<div class='span8'>"
                items += "<p><strong>Address: </strong>" + jsonItem['address1'] + ", Co. " + jsonItem['county'] + ".</p>";
                items += "<p><strong>Price: </strong>" + jsonItem['price'] +  " Euro</p>";  
                items += "<p><strong>House Type: </strong>" +  jsonItem['house_type'] +  "</p>"; 
                items += "</div>"
                items += "</div>"

                items += "<hr />"
                
            });
                    
            $('#ajaxContent1').append(items);
            
            if (items == ""){
                $('#ajaxContent1').append(errorMessage);
            }
          
        }); /* end of getJSON */
        
              
    }); /* end of click function */

}

function initBtnFilterPrice(){
    
    $('#btnFilterPrice').click(function (){
        
        var pricerange = $('#houseprice_id').val();
                
        // Building url with values from dropdowns
        var  url = "api/index.php?action=api_property_get_all_by_price_id&pricebracket=" + pricerange;
        //window.alert(url);
        console.log("Ajax button has been clicked");
               

        $(".ajaxContent").empty();  
        var items = "";
        var errorMessage= "Your search was not successful. Please select different values." 
     
     
        $.getJSON(url, function(json){
   
            $.each(json, function(i,jsonItem){ 
                 
                items += "<div class='row-fluid'>" 
                items += "<div class='span4'>"
                
                items += "<p><img src='uploads/"+ jsonItem['imagefile'] +"' class='property'></p>";   
                items += "</div>"
                items += "<div class='span8'>"
                items += "<p><strong>Address: </strong>" + jsonItem['address1'] + ", Co. " + jsonItem['county'] + ".</p>";
                items += "<p><strong>Price: </strong>" + jsonItem['price'] +  " Euro</p>";  
                items += "<p><strong>House Type: </strong>" +  jsonItem['house_type'] +  "</p>"; 
                items += "</div>"
                items += "</div>"

                items += "<hr />"
                
            });
                    
            $('#ajaxContent1').append(items);
            
            if (items == ""){
                $('#ajaxContent1').append(errorMessage);
            }
          
        }); /* end of getJSON */
        
              
    }); /* end of click function */

}