<form action="{{ url('/user/1/assign-role') }}" method="POST">
@csrf
<label for="role">Selecciona un rol:</label>
<select name="role">
    <option value="admin">Admin</option>
    <option value="editor">Editor</option>
</select>
<button type="submit">Asignar Rol</button>
</form>
