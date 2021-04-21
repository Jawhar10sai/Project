USE [RAMEX]
GO

/****** Object:  Table [dbo].[Connexion]    Script Date: 28/12/2020 09:33:13 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[Connexion](
	[num_cnx] [numeric](10, 0) IDENTITY(1,1) NOT NULL,
	[id_compte] [int] NOT NULL,
	[date_connect] [varchar](50) NULL,
	[heure_connect] [varchar](50) NULL,
	[date_deconnect] [varchar](50) NULL,
	[heure_deconnect] [varchar](50) NULL,
	[id_machine] [varchar](50) NULL,
 CONSTRAINT [PK_Connexion] PRIMARY KEY CLUSTERED
(
	[num_cnx] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[Connexion]  WITH CHECK ADD  CONSTRAINT [FK_Connexion_Compte] FOREIGN KEY([id_compte])
REFERENCES [dbo].[Compte] ([id_compte])
ON UPDATE CASCADE
GO

ALTER TABLE [dbo].[Connexion] CHECK CONSTRAINT [FK_Connexion_Compte]
GO
