let editingId = null;

let toggleEdit = (id) => {
    const questionTextCell = document.getElementById(`question-text-${id}`);
    const originalText = questionTextCell.innerText;

    if (editingId === id) {
        const inputField = questionTextCell.querySelector('input');
        const newText = inputField.value;
        fetch('/model/context/updateQuestion.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `id=${id}&question=${encodeURIComponent(newText)}`
        })
            .then(data => {
                questionTextCell.innerHTML = newText;
                editingId = null;
                console.log(data);
                location.reload();
            })
    } else {
        const inputField = `<input type="text" value="${originalText}" style="width: 100%; box-sizing: border-box;" />`;
        questionTextCell.innerHTML = inputField;
        editingId = id;
    }
}

let deleteQuestion = (id) => {
    fetch('/model/context/deleteQuestion.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `id=${id}`
    })
        .then(data => {
            location.reload();
        })
}
let createQuestion = () => {
    let question = prompt("Quel est la question ?")
    if (question !== "" && question != null) {
        fetch('/model/context/createQuestion.php',{
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `question=${question}`
        })
            .then(data => {
                location.reload();
            })
    }
}