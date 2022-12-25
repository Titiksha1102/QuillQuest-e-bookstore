<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ page import="java.sql.*" %>    
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>signed up</title>
</head>
<body>

  <% 
        String uname=request.getParameter("uname");
		String mail=request.getParameter("mail");
		String mobile=request.getParameter("mobile");
		String password=request.getParameter("password");
		
		
        Class.forName("com.mysql.cj.jdbc.Driver");
		Connection con=DriverManager.getConnection("jdbc:mysql://localhost:3306/pratik","root","");
	  
		PreparedStatement stmt=con.prepareStatement("insert into signup values(?,?,?,?)");
		stmt.setString(1, uname);
		stmt.setString(2, mail );
		stmt.setString(3, mobile);
		stmt.setString(4, password);
		  
		   int i=stmt.executeUpdate();  
		    if(i>0) 
		   {
		   out.print("<html>");
		   out.print("<style>button{height:30px;width:150px;background-color:black;border-radius:10px;}");
		   out.print("a{color:white;text-decoration:none}</style>");
		   out.print("<center><h3>Welcome, ");
		   out.print(uname+"</h3><h3>You have successfully registered </h3>");
		   out.print("<button><a href='index.html'>Continue shopping</a></button>");
		   out.print("</center>");
		   out.println("</html>");
           con.close();  
		   }
    %>

</body>
</html>