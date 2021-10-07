const date_start = document.getElementById('date_start');
date_start.valueAsNumber = Date.now()-(new Date()).getTimezoneOffset()*60000;

const date_end = document.getElementById('date_end');
date_end.valueAsNumber = Date.now()-(new Date()).getTimezoneOffset()*60000;