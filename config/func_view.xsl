<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
    
<html>
   <head>
        <title>
            Function Views
        </title>
   </head> 
<body style="font-family:Arial;font-size:12pt;background-color:#EEEEEE">
<xsl:for-each select="pages/page">
  <div style="background-color:white;color:#DE9155;padding:4px;margin-top:5px;">
    <span style="font-weight:bold">
        Page Name: 
        <xsl:value-of select="@page_name"/>
    </span>
    <xsl:for-each select="func_view">
        <div style="background-color:#5377A5;color:white;padding:4px;margin-top:10px; margin-left:10px;">
          <span style="font-weight:bold">
              Right:
              <xsl:value-of select="@right"/>
              View: 
              <xsl:value-of select="@name"/>
          </span>
        </div>
    </xsl:for-each>
  </div>
</xsl:for-each>
</body>
</html>

</xsl:template>
</xsl:stylesheet>