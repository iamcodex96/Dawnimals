function swichClass(elemento, input, output){
    if($(elemento).hasClass(input)){
        $(elemento).removeClass(input);
        $(elemento).addClass(output);
    }else{
        $(elemento).removeClass(output);
        $(elemento).addClass(input);
    }
}
