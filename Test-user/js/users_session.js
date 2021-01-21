let userSessionList = function (userArr) {
	let result = '';
	for (let cur in us) {
		if(userArr[cur]['logInTime']){
			result += `<tr><td>${userArr[cur]['name']}</td><td>${userArr[cur]['logInTime']}</td><td>${userArr[cur]['logOutTime']}</td></tr>`;
		}
	}
	return result;
}

let resultUserSessionList = userSessionList(userArr);
userSessionListTable.innerHTML = resultUserSessionList;