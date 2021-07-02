USE [RAMEX]
GO

/****** Object:  Table [dbo].[Ramassage_anc]    Script Date: 28/12/2020 10:59:23 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[Ramassage_anc](
	[id] [numeric](19, 0) IDENTITY(1,1) NOT NULL,
	[num_ram] [numeric](19, 0) NOT NULL,
	[code_ram] [varchar](50) NULL,
	[date_saisie_ram] [varchar](50) NULL,
	[date_prevue_ram] [varchar](50) NULL,
	[compte_demande] [int] NULL,
	[compte_affectation] [int] NULL,
	[compte_confirmation] [int] NULL,
	[date_ram_reel] [varchar](50) NULL,
	[comment_demande] [varchar](300) NULL,
	[comment_affectation] [varchar](300) NULL,
	[comment_confirmation] [varchar](300) NULL,
	[code_clt] [varchar](50) NULL,
	[etat_ram] [int] NULL,
	[matricule_ramasseur] [varchar](50) NULL,
	[date_prog_ram] [varchar](50) NULL,
	[nv_client_id] [int] NULL,
	[nom_client] [varchar](50) NULL,
	[nom_secteur] [varchar](50) NULL,
	[date_affectation] [varchar](50) NULL,
	[date_confirmation] [varchar](50) NULL,
	[nom_ramasseur] [varchar](50) NULL,
	[heure_prevue_ram] [varchar](50) NULL,
	[heure_prog_ram] [varchar](50) NULL,
	[heure_reel_ram] [varchar](50) NULL,
	[nbr_expedition] [int] NULL,
	[nbr_colis] [int] NULL,
	[nom_agence] [varchar](50) NULL,
	[num_act] [numeric](10, 0) NULL,
	[type_canal] [varchar](50) NULL,
	[nom_canal] [varchar](50) NULL,
	[adresse_ram] [varchar](300) NULL,
 CONSTRAINT [PK_Ramassage_anc] PRIMARY KEY CLUSTERED
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[Ramassage_anc]  WITH CHECK ADD  CONSTRAINT [FK_Ramassage_anc_Action] FOREIGN KEY([num_act])
REFERENCES [dbo].[Action] ([num_act])
ON UPDATE CASCADE
GO

ALTER TABLE [dbo].[Ramassage_anc] CHECK CONSTRAINT [FK_Ramassage_anc_Action]
GO
