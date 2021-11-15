function createContent(record){
    let contentElement = document.createElement('div');
    contentElement.innerHTML = record.fact;
    return contentElement;
}

function createFactsListItem(record){
    let itemElement = document.createElement('div');
    itemElement.classList.add('facts-list-item');
    itemElement.append(createContent(record));
    return itemElement;
}

function renderRecords(records){
    let factsList = document.querySelector('.facts-list');
    factsList.innerHTML = '';
    for (i = 0; i < records.length; i++){
        factsList.append(createFactsListItem(records[i]));
    }
}

function downloadData(){
    let factsList = document.querySelector('.facts-list');
    let xhr = new XMLHttpRequest();
    xhr.open('GET', factsList.dataset.url);
    xhr.responseType = 'json';
    xhr.onload = function(){
        renderRecords(this.response.data);
    }
    xhr.send();
}

window.onload = function(){
    downloadData();
}