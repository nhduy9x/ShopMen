<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
table, th, td {
  border: 1px solid black;
}
</style>
</head>
<body>
	<table>
  <tr>
    <th>Firstname</th>
    <th>Lastname</th>
  </tr>
  <tr>
    <td>Peter</td>
    <td>Griffin</td>
  </tr>
  <tr>
    <td>Lois</td>
    <td>Griffin</td>
  </tr>
</table>
ma xac nhan tai khoan cua ban la:
{{$content['code']}}
<a href="{{route('rest.pass',$content['email'])}}">hrel</a>
</body>
</html>