function setCookie(key, value) {
	document.cookie = `${key}=${value};expire=0`
}
function getCookie(key) {
	const cookies = document.cookie.split(';');
	for (let cookie of cookies) {
		cookie = cookie.trim();
		const [k, v] = cookie.split('=');
		if (k === key)
			return (v);
	}
}
const todoList = document.getElementById('ft_list');
JSON.parse(getCookie('todo-list') || "[]").forEach((name) => {
	const todo = document.createElement('div');
	todo.innerHTML = name;
	todoCookies = JSON.parse(getCookie('todo-list') || "[]");
	todoCookies.unshift(name);
	todo.addEventListener('click', (e) => {
		if (!confirm(`Do you really want to delete '${e.target.innerText}' todo`))
			return ;
		todoList.removeChild(e.target);
		todoCookies.splice(todoCookies.findIndex((v) => v === e.target.innerText), 1);
		setCookie('todo-list', JSON.stringify(todoCookies));
	})
	todoList.append(todo);
})
document.getElementById('new-todo-button').addEventListener('click', () => {
	const name = prompt('name a todo');
	if (name === null || name.trim().length === 0)
		return ;
	const todo = document.createElement('div');
	todoCookies = JSON.parse(getCookie('todo-list') || "[]");
	todoCookies.unshift(name);
	todo.innerHTML = name;
	todo.addEventListener('click', (e) => {
		if (!confirm(`Do you really want to delete '${e.target.innerText}' todo`))
			return ;
		todoList.removeChild(e.target);
		todoCookies.splice(todoCookies.findIndex((v) => v === e.target.innerText), 1);
		setCookie('todo-list', JSON.stringify(todoCookies));
	})
	todoList.prepend(todo);
	setCookie('todo-list', JSON.stringify(todoCookies));
})
