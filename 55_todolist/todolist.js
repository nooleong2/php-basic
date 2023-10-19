const todo_btn = document.querySelector("#todo_btn");
todo_btn.addEventListener("click", () => {

    const subject = document.querySelector("#subject");
    if (subject.value == "") {
        alert("할 일을 입력해주세요.");
        subject.focus();
        return;
    }

    document.todo_form.submit();

});

function todoChecked(idx) {
    useMultiform(idx, "done");
}

function todoUnChecked(idx) {
    useMultiform(idx, "undone");
}

function todoDel(idx) {
    if (confirm("삭제하시겠습니까?")) {
        useMultiform(idx, "delete");
    }
}

function useMultiform(idx, value) {
    const multiform = document.querySelector("#multiform");
    multiform.mode.value = value;
    multiform.idx.value = idx;
    multiform.submit();
}