USE [RAMEX]
GO

/****** Object:  Table [dbo].[Menu_Compte]    Script Date: 28/12/2020 10:23:44 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[Menu_Compte](
	[id_menu] [int] NOT NULL,
	[id_compte] [int] NOT NULL,
	[etat] [int] NULL,
 CONSTRAINT [PK_Menu_Compte] PRIMARY KEY CLUSTERED
(
	[id_menu] ASC,
	[id_compte] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[Menu_Compte]  WITH CHECK ADD  CONSTRAINT [FK_Menu_Compte_Compte] FOREIGN KEY([id_compte])
REFERENCES [dbo].[Compte] ([id_compte])
ON UPDATE CASCADE
GO

ALTER TABLE [dbo].[Menu_Compte] CHECK CONSTRAINT [FK_Menu_Compte_Compte]
GO

ALTER TABLE [dbo].[Menu_Compte]  WITH NOCHECK ADD  CONSTRAINT [FK_Menu_Compte_Menu] FOREIGN KEY([id_menu])
REFERENCES [dbo].[Menu] ([id_menu])
ON UPDATE CASCADE
GO

ALTER TABLE [dbo].[Menu_Compte] CHECK CONSTRAINT [FK_Menu_Compte_Menu]
GO
