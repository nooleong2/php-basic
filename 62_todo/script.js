'use strict';

const btn_add_todo = document.querySelector("#btn_add_todo");
btn_add_todo.addEventListener("click", () => {
    
    const title = document.querySelector("#title");
    const content = document.querySelector("#content");

    const data = {
        title: title.value,
        content: content.value,
    }

    console.log(data);

    fetch("./process.php", {
        method: "POST",
        header: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    }).then((response) => {
        console.log(response);
    }).catch((error) => {
        console.log(error);
    })
});