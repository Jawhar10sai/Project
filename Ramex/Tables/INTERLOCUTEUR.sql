USE [RAMEX]
GO

/****** Object:  Table [dbo].[INTERLOCUTEUR]    Script Date: 28/12/2020 09:34:43 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[INTERLOCUTEUR](
	[interloc_id] [numeric](18, 0) IDENTITY(1,1) NOT NULL,
	[client_id] [numeric](18, 0) NULL,
	[nom] [varchar](64) NULL,
	[prenom] [varchar](64) NULL,
	[civilite_cod] [char](2) NULL,
	[fonction_cod] [char](4) NULL,
	[tel] [varchar](10) NULL,
	[fax] [varchar](50) NULL,
 CONSTRAINT [PK_INTERLOCUTEUR] PRIMARY KEY CLUSTERED
(
	[interloc_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
