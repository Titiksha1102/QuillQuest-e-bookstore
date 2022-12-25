<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ page import="java.sql.*" %>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>logged in</title>
</head>
<body>
     <% String uname=request.getParameter("uname");
		
		String password=request.getParameter("password");
		
		
        Class.forName("com.mysql.cj.jdbc.Driver");
		Connection con=DriverManager.getConnection("jdbc:mysql://localhost:3306/pratik","root","");
		Statement stmt=con.createStatement();
		
		ResultSet rs = stmt.executeQuery("select * from signup where username='" + uname+ "' and password='" + password + "'");
		if(rs.next()){
			out.print("<html>");
			out.print("<style>button{height:30px;width:150px;background-color:black;border-radius:10px;}");
			out.print("a{color:white;text-decoration:none}</style>");
			out.print("<center><h3>Welcome back, ");
			out.print(uname+".</h3>");
			out.print("<button><a href='index.html'>Continue shopping</a></button>");
			out.print("</center>");
			out.println("</html>");
	        con.close();
		}
     %>
</body>
</html>