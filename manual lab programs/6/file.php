<%@ page import="java.sql.*" %> 
<%@ page import="java.io.*" %> 
<%@ page import="java.util.*" %> 
 
<% Class.forName("com.mysql.jdbc.Driver "); %> 
<HTML> 
<HEAD> 
<TITLE>Fetching Data From a Database</TITLE> 
</HEAD> 
<BODY> 
<H1>Fetching Data From a Database</H1> 
 
<%  
Connection connection = 
DriverManager.getConnection("jdbc:mysql://localhost:3306/library","root", 
"Jaisakthi"); 
 
Statement statement = connection.createStatement(); 
 
int id = Integer.parseInt(request.getParameter("id"));   
 
ResultSet resultset =  
statement.executeQuery("select * from mark where regno = " + id ) ;  
 
if(!resultset.next()) { 
out.println("Sorry, could not find that publisher. "); 
} else { 
%> 
 
<TABLE BORDER="1"> 
<TR> 
<TH>REGNO</TH> 
<TH>Name</TH> 
<TH>MARK</TH> 
</TR> 
<TR> 
<TD> <%= resultset.getInt(1) %> </TD> 
<TD> <%= resultset.getString(2) %> </TD> 
<TD> <%= resultset.getInt(3) %> </TD> 
         </TR> 
</TABLE> 
<BR> 
<%  
}  
%> 
</BODY> 
</HTML>