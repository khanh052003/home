
window.addEventListener("load", function () {
    var musicsData = document.getElementById('user-data').getAttribute('data-users');
    var musics = JSON.parse(musicsData);
    console.log(musics);
})