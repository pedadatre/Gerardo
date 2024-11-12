document.addEventListener('DOMContentLoaded', () => {
    const paragraph = document.getElementById('log2');
    if (paragraph) {
paragraph.innerHTML = paragraph.textContent
        .split('')
        .map((char, index) => {
if (char === ' ') {
            return ' ';
}
return `<span style="--index: ${index}">${char}</span>`;
        })
        .join('');
    }
});
