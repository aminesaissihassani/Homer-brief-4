var filterBooks = [];
var filterAuthors = [];

function filterBook()
{
    // adding the name to the filter show
    var booksName = document.getElementById("booksnamefilter").value;
    var idBooksName = booksName.replace(/ /g, "-");
    document.getElementById("showfilter").innerHTML += '<div class="' + idBooksName + '">' +
            '<span>' + booksName + '</span>' +
            '<label for="' + idBooksName + '"><i class="fas fa-minus-circle"></i></label>' +
            '<input id="' + idBooksName + '" type="button" class="btnnone fBook" onclick="removeFilter(this, filterBooks);">' +
        '</div>';
    filterBooks.push(booksName);

    // filtring 

    filter();

}

function filterAuthor()
{
    // adding the name to the filter show

    var authorsName = document.getElementById("authorsnamefilter").value;
    var idAuthorsName = authorsName.replace(/ /g, "-");
    document.getElementById("showfilter").innerHTML += '<div class="' + idAuthorsName + '">' +
            '<span>' + authorsName + '</span>' +
            '<label for="' + idAuthorsName + '"><i class="fas fa-minus-circle"></i></label>' +
            '<input id="' + idAuthorsName + '" type="button" class="btnnone fAuthor" onclick="removeFilter(this, filterAuthors);">' +
        '</div>';
    filterAuthors.push(authorsName);

    // filtring 

    filter();
}

function filter()
{
    var sections = document.getElementsByTagName("section");
    var secLen = sections.length;
    var author = document.getElementsByClassName("author");
    var title = document.getElementsByClassName("title");
    // var booklen = filterBooks.length;
    // var thereIs = false;
    // booksfilter
    if(filterAuthors.length==0){
        for (var i = 0; i < secLen; i++)
        {
            for (var j in filterBooks)
            {
                if (filterBooks[j] == title[i].innerHTML)
                {
                    sections[i].style = "display:block";
                    break;
                }
                else
                {
                    sections[i].style = "display:none";
                }
            }
        }
    }
    if(filterBooks.length==0){
        for (var i = 0; i < secLen; i++)
        {
            for (var j in filterAuthors)
            {
                if (filterAuthors[j] == author[i].innerHTML)
                {
                    sections[i].style = "display:block";
                    break;
                }
                else
                {
                    sections[i].style = "display:none";
                }
            }
        }
    }
    if(filterBooks.length>0 && filterAuthors.length>0){
      var max=  Math.max(filterBooks.length, filterAuthors.length);
    //   alert(max);
        for (var i = 0; i < secLen; i++)
        {
            for (var j=0;j< max;j++)
            {
                if ((filterAuthors[j] == author[i].innerHTML) &&(filterBooks[j] == title[i].innerHTML) )
                {
                    sections[i].style = "display:block";
                   
                }
                else
                {
                    sections[i].style = "display:none";
                }
            }
        }
    }
}
// function disp()
// {
//     var sections = document.getElementsByTagName("section");
//     var secLen = sections.length;
//     for (var i = 0; i < secLen; i++)
//     {
      
//                 sections[i].style = "display:block";
// }
// }
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
    
    // alert(list.length);
    // for (var i = 0; i < list.length; i++){
    //     alert(list[i]+Name);
    // }

    // for (var i = 0; i < list.length; i++)
    // {
    //     console.log(list[i]);
    // }

    // console.log(list.length);
    // var Name = me.id.replace(/-/g, " ");
    // if (yousus)
    // {
    //     for (var i in list)
    //     {
    //         if (filterAuthors[i] == Name)
    //         {

    //         }
    //     }
    // }
}

//  authorsfilter
//     else
//     {
//         for (var i = 0; i < secLen; i++)
//         {
//             thereIs = false;
//             for (var j in filterAuthors)
//             {
//                 if (j == filtersName)
//                 {
//                     thereIs = true;
//                 }
//             }
//             if (!thereIs)
//             {
//                 sections[i].style = "display:none";
//             }
//             else
//             {
//                 sections[i].style = "display:block";
//             }
//         }
//     }