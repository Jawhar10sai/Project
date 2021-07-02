CREATE TABLE [dbo].[Action](
	[num_act] [numeric](10, 0) IDENTITY(1,1) NOT NULL,
	[date_act] [datetime] NULL,
	[type_act] [varchar](50) NULL,
	[etape] [varchar](50) NULL,
	[num_cnx] [numeric](10, 0) NULL,
	[code_ram] [varchar](50) NULL,
 CONSTRAINT [PK_Action] PRIMARY KEY CLUSTERED
(
	[num_act] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[Action]  WITH NOCHECK ADD  CONSTRAINT [FK_Action_Connexion] FOREIGN KEY([num_cnx])
REFERENCES [dbo].[Connexion] ([num_cnx])
ON UPDATE CASCADE
ON DELETE CASCADE
GO

ALTER TABLE [dbo].[Action] CHECK CONSTRAINT [FK_Action_Connexion]
GO
