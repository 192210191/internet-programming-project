<?xml version="1.0" ?> 
<xsl:stylesheet version="1.0"       
              xmlns:xsl="http://www.w3.org/1999/XSL/Transform"> 
<xsl:template match="/"> 
<html><body> 
<h2>Systemconfig</h2> 
<table border="1"><tr> 
<th>Processor</th> 
<th>Version</th> 
<th>Speed</th> 
<th>Rate</th> 
</tr> 
<xsl:for-each select="systemcon/com"> 
 
<tr> 
<td><xsl:value-of select="processor"/></td> 
<td><xsl:value-of select="version"/></td> 
<td><xsl:value-of select="speed"/></td> 
<td><xsl:value-of select="rate"/></td> 
</tr> 
</xsl:for-each> 
</table> 
</body> 
</html> 
</xsl:template> 
</xsl:stylesheet> 