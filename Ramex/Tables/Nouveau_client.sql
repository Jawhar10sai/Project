USE [RAMEX]
GO

/****** Object:  Table [dbo].[Nouveau_Client]    Script Date: 28/12/2020 10:25:59 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[Nouveau_Client](
	[id_client] [int] IDENTITY(1,1) NOT NULL,
	[raison_social] [varchar](50) NULL,
	[secteur] [varchar](50) NULL,
	[activite] [varchar](50) NULL,
	[num_adresse] [char](10) NULL,
	[adresse] [varchar](250) NULL,
	[nom_contact] [varchar](50) NULL,
	[tel_contact] [char](10) NULL,
	[fixe_contact] [char](10) NULL,
	[agence] [varchar](50) NULL,
	[fonction_contact] [varchar](50) NULL,
 CONSTRAINT [PK_Nouveau_Client] PRIMARY KEY CLUSTERED
(
	[id_client] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY],
 CONSTRAINT [IX_Nouveau_Client] UNIQUE NONCLUSTERED
(
	[raison_social] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
