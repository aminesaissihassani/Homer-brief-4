var filterBooks = [];
var filterAuthors = [];
function test(event,ft){
    if (event.keyCode === 13) {
            if(ft=="b"){
            filterBook();
            }
            else{
                filterAuthor();
            }
       }
}

function filterBook()
{
    // adding the name to the filter show
    var booksName = document.getElementById("booksnamefilter").value.trim();
    if(booksName !=""){
    var idBooksName = booksName.replace(/ /g, "-");
    document.getElementById("fbook").innerHTML = '<div class="' + idBooksName + '">' +
            '<span>' + booksName + '</span>' +
            '<label for="' + idBooksName + '"><i class="fas fa-minus-circle"></i></label>' +
            '<input id="' + idBooksName + '" type="button" class="btnnone fBook" onclick="removeFilter(this, filterBooks);">' +
        '</div>';
    filterBooks[0]=booksName;
    document.getElementById("booksnamefilter").value="";

    // filtring 

    filter();
    }

}

function filterAuthor()
{
    // adding the name to the filter show

    var authorsName = document.getElementById("authorsnamefilter").value.trim();
    if(authorsName !=""){
    var idAuthorsName = authorsName.replace(/ /g, "-");
    document.getElementById("fauthor").innerHTML += '<div class="' + idAuthorsName + '">' +
            '<span>' + authorsName + '</span>' +
            '<label for="' + idAuthorsName + '"><i class="fas fa-minus-circle"></i></label>' +
            '<input id="' + idAuthorsName + '" type="button" class="btnnone fAuthor" onclick="removeFilter(this, filterAuthors);">' +
        '</div>';
    filterAuthors.push(authorsName);
    document.getElementById("authorsnamefilter").value="";
    // filtring 

    filter();
    }
    
}

function filter()
{
    var sections = document.getElementsByTagName("section");
    var secLen = sections.length;
    var author = document.getElementsByClassName("author");
    var title = document.getElementsByClassName("title");
    var cpa=0;
    if(filterAuthors.length==0){
        for (var i = 0; i < secLen; i++)
        {
             if (filterBooks[0].toUpperCase() == title[i].innerHTML.toUpperCase())
                {
                    sections[i].style = "display:block";
                }
                else
                {
                    sections[i].style = "display:none";
                }
         }
        }

    if(filterBooks.length==0){
        for (var i = 0; i < secLen; i++)
        {
            cpa=0;
            for (var j in filterAuthors)
            {
                
                for( var k=0;k<author[i].length;k++){
                    // console.log("select:"+author[i].options[k].value+" list: "+filterAuthors[j]);
                    if (filterAuthors[j].toUpperCase() == author[i].options[k].value.toUpperCase())
                    {
                        cpa++;
                        break;
                    }
                }
               
            }

            if (filterAuthors.length==cpa)
            {
                
                sections[i].style = "display:block";
            }
            else
            {
                sections[i].style = "display:none";
               
            }
        }
    }
    if(filterBooks.length>0 && filterAuthors.length>0){
        for (var i = 0; i < secLen; i++)
        {
            cpa=0; 
            for (var j in filterAuthors)
            {
                
                for( var k=0;k<author[i].length;k++){
                    if (filterAuthors[j].toUpperCase() == author[i].options[k].value.toUpperCase())
                    {
                        cpa++;
                        break;
                    }
                }
               
            }

            if (filterAuthors.length==cpa)
            {
                if (filterBooks[0].toUpperCase() == title[i].innerHTML.toUpperCase())
                {
                    sections[i].style = "display:block";
                }
                else
                {
                    sections[i].style = "display:none";
                }
            }
            else
            {
                sections[i].style = "display:none";
               
            }
        }
    }
}
function removeFilter(me, list)
{
    var sections = document.getElementsByTagName("section");
    var secLen = sections.length;
    var myobj = document.getElementById(me.id);
    myobj.closest("div").remove();
    var Name = me.id.replace(/-/g, " ");
    for (var i = 0; i < list.length; i++)
    {
        console.log(list[i]);
        if (list[i] == Name)
        {
            var index = list.indexOf(Name);
            if (index !== -1) 
            {
                list.splice(index, 1);
            }
            break;
        }
    }
    // console.log(list);
    if(filterBooks.length == 0 && filterAuthors.length == 0)
    {
        for (var i = 0; i < secLen; i++)
        {
            sections[i].style = "display:block";
        }
    }
    else
    {
        filter();
    }
    
}
