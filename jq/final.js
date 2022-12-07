
//make each div a column of slides, all of them but hover is out of frame
//once hovered, get initial position then go to main/front/user screen
//once hover out, return to initial position


var content = document.querySelector('#content');
var hoverColor = document.querySelector('#mask-hover');

function switchPanel(e){
    
    var dataOrder = e.getAttribute('data-order');
    // var child = content.children.item(e.getAttribute('data-order'));

    marginInput = dataOrder * (-100);
    marginHover = (dataOrder * 20) -80;

    // console.log(marginInput);

    content.style.marginTop = marginInput +"vh";
    hoverColor.style.marginTop = marginHover + "vh";

    // console.log(content.children.length);

    // for (const child of myElement.children) {
    //     console.log(child.tagName);
    //   }

    // for(let i = 0; i < content.children.length; i++){

    //     content.children.item(i).style.display = "none";
    // }

    // content.children.item(dataOrder - 1).style.display = "grid";

    // document.querySelector('#content :nth-child('+CSS.escape(dataOrder)+')').style.display = "grid";

    // console.log(content.children.item(e.getAttribute('data-order') -1));
}