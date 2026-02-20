<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="2.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:output method="xml" indent="yes"/>
  <xsl:template match="/products">
    <root>
      <xsl:for-each-group select="product[quantity &gt;= 10]" group-by="category">
        <category name="{current-grouping-key()}">
          <xsl:for-each select="current-group()">
            <xsl:sort select="price" data-type="number" order="descending"/>
            <product productname="{productname}">
              <price><xsl:value-of select="price"/></price>
              <quantity><xsl:value-of select="quantity"/></quantity>
              <total-price>
                <xsl:value-of select="number(price) * number(quantity)"/>
              </total-price>
            </product>
          </xsl:for-each>
        </category>
      </xsl:for-each-group>
    </root>
  </xsl:template>
</xsl:stylesheet>