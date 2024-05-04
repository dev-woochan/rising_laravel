const button_increase = document.getElementById('button_increase');
const button_decrease = document.getElementById('button_decrease');
const select = document.getElementById('select');
button_increase.onclick = () => {
    button_increase.style.backgroundColor = '#FF5c5c';
    button_decrease.style.backgroundColor = '#cecdce';
    select.value = "오른다";
}

button_decrease.onclick = () => {
    button_decrease.style.backgroundColor = 'blue';
    button_increase.style.backgroundColor = '#cecdce';
    select.value = "내린다";
}
