$(document).ready(function() {
    var item, title, author, publisher, bookLink, bookImg
    var outputList = document.getElementById("list-output");
    var bookUrl = "https://www.googleapis.com/books/v1/volumes?q="                  
    var placeHldr = '<img src="https://via.placeholder.com/150">'
    var searchData;

    // listener for search button
    $("#search").click(function(){
        outputList.innerHTML = ""
        searchData = $("#search-box").val();
        //handling empty search input field
        if(searchData === "" || searchData === null){
            displayError();
        }else{
            $.ajax({
                url: bookUrl + searchData,
                dataType: "json",
                success: function(responce) {
                    console.log(responce)
                    if(responce.totalItem === 0){
                        alert("no results!... try again");
                    }else{
                        displayResults(responce);
                    }
                },
                error: function(){
                    alert("Something went wrong!... ");
                }
            })
        }
        $("#search-box").val("");
    });

    function displayResults(res){
        
        for(var i = 0; i< res.items.length; i++){
            item = res.items[i];
            title1 = item.volumeInfo.title;            
            authors1 = '';            
            for (var j=0; j<item.volumeInfo.authors.length; j++){
                if(authors1 === '' || authors1 === null){
                    authors1 = item.volumeInfo.authors[j];                    
                }else{
                    authors1 = authors1 +'; '+item.volumeInfo.authors[j];
                }                
            }
          
            author1 = authors1;
            publisher1 = item.volumeInfo.publisher;
            bookLink1 = item.volumeInfo.previewLink;
            
            isbnL = '';
            for (var k=0; k<item.volumeInfo.industryIdentifiers.length; k++){
                if((isbnL === '' || isbnL === null) &&  (k === 0)){
                    isbnL = item.volumeInfo.industryIdentifiers[k].identifier;                    
                }              
            }
            
            bookIsbn1 = isbnL; 
            bookImg1 = (item.volumeInfo.imageLinks) ? item.volumeInfo.imageLinks.thumbnail : placeHldr

            //output to output list
            outputList.innerHTML += '<div class="row mt-4"> Marcar como favorito <input type="checkbox" name="idopt'+i+'"  value=""> <input type="hidden" readonly name="isbn'+i+'"  value="'+bookIsbn1+'"> <input type="hidden" readonly name="title'+i+'"  value="'+title1+'"> '+
                                    formatOutPut(bookImg1, title1,author1,publisher1, bookLink1,bookIsbn1)+                                    
                                    '</div> ';
        }
    }


    function formatOutPut(bookImg, title, author, publisher, bookLink, bookIsbn){
        var viewerUrl = 'book.html?isbn=#'+bookIsbn;
        var htmlCard =`<div class="col-lg-6">
                            <div class="card" style="">
                                <div class="row no-gutters">`;

                                    if(bookImg.indexOf('books.google') > -1 ){
                                        htmlCard += `<div class="col-md-4">
                                                        <img src="${bookImg}" class="card-img" alt="...">
                                                    </div>`;
                                    }

            htmlCard +=             `<div class="col-md-8">
                                        <div class="cad-body">
                                            <h5 class="card-title">Title: ${title}<h5>
                                            <p class="card-text">Author: ${author}</p>
                                            <p class="card-text">Publisher: ${publisher}</p>
                                            <a target="_blank" href="${viewerUrl}" class="btn btn-secondary"> Mais infos visualizar </a> &nbsp; &nbsp;
                                            <a target="_blank" href="${bookLink}" class="btn btn-secondary"> Mais infos resumo </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <hr /> `
        return htmlCard;
    }

    function displayError(){
        alert("search tem can not be empty");
    }

}) 

