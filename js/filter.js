var filterBooks = "";
var filterAuthors = [];

function filterBook()
{
    // adding the name to the filter show
    var booksName = document.getElementById("booksnamefilter").value;
    if(booksName !=""){
    var idBooksName = booksName.replace(/ /g, "-");
    document.getElementById("fbook").innerHTML = '<div class="' + idBooksName + '">' +
            '<span>' + booksName + '</span>' +
            '<label for="' + idBooksName + '"><i class="fas fa-minus-circle"></i></label>' +
            '<input id="' + idBooksName + '" type="button" class="btnnone fBook" onclick="removeFilter(this, filterBooks);">' +
        '</div>';
    filterBooks=booksName;
    

    // filtring 

    filter();
    }

}

function filterAuthor()
{
    // adding the name to the filter show

    var authorsName = document.getElementById("authorsnamefilter").value;
    if(authorsName !=""){
    var idAuthorsName = authorsName.replace(/ /g, "-");
    document.getElementById("fauthor").innerHTML += '<div class="' + idAuthorsName + '">' +
            '<span>' + authorsName + '</span>' +
            '<label for="' + idAuthorsName + '"><i class="fas fa-minus-circle"></i></label>' +
            '<input id="' + idAuthorsName + '" type="button" class="btnnone fAuthor" onclick="removeFilter(this, filterAuthors);">' +
        '</div>';
    filterAuthors.push(authorsName);

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
             if (filterBooks == title[i].innerHTML)
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
                    if (filterAuthors[j] == author[i].options[k].value)
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
                    if (filterAuthors[j] == author[i].options[k].value)
                    {
                        cpa++;
                        break;
                    }
                }
               
            }

            if (filterAuthors.length==cpa)
            {
                if (filterBooks == title[i].innerHTML)
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
    // console.log("hehe" + Name);
    // console.log("hehe" + list.length);
    for (var i = 0; i < list.length; i++)
    {
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
    console.log(list);
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
